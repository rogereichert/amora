<?php

// aqui ficará todos os blocos phps necessários


function ContarRegistro($tabela)
{
    include('../config/conexao.php');
    $selectCliente = "SELECT * FROM $tabela";

    try {

        $result = $conect->prepare($selectCliente);
        $result->execute();
        $contar = $result->rowCount();
        return $contar;
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

function ContarRegistroPedidos()
{
    include('../config/conexao.php');
    $selectCliente = "SELECT * FROM tbl_pedidos WHERE status_pedido = 1";

    try {

        $result = $conect->prepare($selectCliente);
        $result->execute();
        $contar = $result->rowCount();
        return $contar;
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="color: #BC5050;">Status</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Novas Vendas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo  ContarRegistroPedidos() ?></h3>

                            <p>Pedidos em Aberto</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="home.php?acao=relatorio_pedido" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo  ContarRegistro('tbl_clientes') ?></h3>

                            <p>Registros de Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="home.php?acao=relatorio_cliente" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo  ContarRegistro('tbl_vendas') ?></h3>

                            <p>Registro de Vendas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="home.php?acao=relatorio_venda" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>