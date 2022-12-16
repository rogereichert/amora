<?php
ob_start(); //Armazena meus dados em cache
session_start(); //Inicia a sessão
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amora 2.0</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/estilo-login.css">
</head>

<body class="hold-transition login-page" style="background-color: #FEF5F3 ;">
  <div class="login-box">
    <div class="login-logo">
      <a href="#" style="color: #BC5050; font-size: 3rem"><img src="img/amora1.png" style="width: 50%;"></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body" style="box-shadow: 0px 0px 16px 11px rgba(188,80,80,0.1); border-radius: 5px;">
        <p class="login-box-msg">Para acessar entre com Usuário e Senha</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" name="usuario" class="form-control" placeholder="Digite seu Usuário...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="senha" class="form-control" placeholder="Digite sua Senha...">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">

            </div>
            <!-- /.col -->
            <div class="col-12" style="margin-bottom: 5px">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-button">Acessar o Sistema</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <?php

        include_once('config/conexao.php');

        // MÉTODO DE AÇÃO NEGADO
        if (isset($_GET['acao'])) {
          $acao = $_GET['acao'];
          if ($acao == 'negado') {
            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Erro ao Acessar o sistema!</strong> Efetue o login ;(</div>';
            header("Refresh: 2, index.php");
          } else if ($acao == 'sair') {
            echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Você saiu do Sistema!</strong> Esperamos que você volte ;(</div>';
            header("Refresh: 2, index.php");
          }
        }

        // CRIAÇÃO DA SESSÃO DE LOGIN
        if (isset($_POST['usuario'])) {

          require('app/classes/Usuario.php');

          $usuario = new Usuario;

          $usuario->setUsuario($_POST['usuario']);
          $usuario->setSenha($_POST['senha']);

          $usuario->logarUsuario();
        }
        ?>
        <!-- /.social-auth-links -->
        <p style="text-align: center; padding-top: 25px">
          <a href="cad_user.php" class="text-center" style="color: #BC5050;">Se ainda não tem cadastro clique aqui!</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

</body>

</html>