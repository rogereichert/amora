<?php
//ob_start();
session_start();

if (!isset($_SESSION['loginUser']) and !isset($_SESSION['senhaUser']) and !isset($_SESSION['idUser'])) {
  header("Location: ../index.php?acao=negado");
  exit;
}

include_once('sair.php');

?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amora</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free-6.2.1/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="stylesheet" href="../dist/css/estilo.css">
  <link rel="stylesheet" href="../dist/css/perfil.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php

    require '../app/classes/Usuario.php';

    $usuarioLogado = $_SESSION['loginUser'];
    $usuarioSenha = $_SESSION['senhaUser'];
    $usuarioId    = $_SESSION['idUser'];

    $usuario = new Usuario;

    $usuario->setUsuario($usuarioLogado);
    $usuario->setSenha($usuarioSenha);

    $usuario->mostrarDadosUsuario();

    ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" title="Perfil e Saída">
            <i class="fas fa-user-circle"></i> <!-- AQUI -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <div class="dropdown-divider"></div>
            <a href="home.php?acao=perfil" class="dropdown-item">
              <i class="fas fa-user-alt mr-2"></i></i> Alterar Perfil

            </a>
            <div class="dropdown-divider"></div>
            <a href="?sair" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Sair do sistema

            </a>

        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 painel">
      <!-- Brand Logo -->
      <a href="#" class="brand-link" style="border-bottom: none; display: flex; align-items: center; justify-content: center;">
        <img src="../img/amora2.png" alt="" style="width: 80%; ">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border: none !important;">
          <div class="image">
            <img src="../img/server/<?php echo $usuario->getFoto() ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="home.php?acao=perfil" class="d-block menu-link "><?php echo $usuario->getNome(); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="home.php?acao=bemvindo" class="nav-link menu-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Home Page
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link menu-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Cadastros
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="home.php?acao=cadastrar_cliente" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=cadastrar_produto" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=cadastrar_fornecedor" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fornecedores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=cadastrar_pedido" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pedidos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=cadastrar_venda" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Vendas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=cadastrar_caixa" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Movimentação Caixa</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link menu-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Consultas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="home.php?acao=relatorio_cliente" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=relatorio_pedido" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pedidos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=relatorio_venda" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Vendas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="home.php?acao=relatorio_caixa" class="nav-link menu-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Caixa</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link menu-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Vendas
                </p>
              </a>
            </li>

           
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>