<?php

require '../config/conexao.php';

if (!isset($_GET['idVenda'])) {
    $nome = "";
    $pedido = "";
    $id_venda = "";
} else {
    $id_venda = filter_input(INPUT_GET, 'idVenda', FILTER_DEFAULT);

    $select = "SELECT
    `tbl_pedidos`.`id`,
    `tbl_clientes`.`nome`,
    `tbl_pedidos`.`data_pedido`,
    `tbl_pedidos`.`data_entrega`,
    `tbl_pedidos`.`capa`,
    `tbl_pedidos`.`prioridade`,
    `tbl_pedidos`.`pedido`,
    `tbl_pedidos`.`status_pedido`
  FROM
   `amora`.`tbl_pedidos`
    INNER JOIN `amora`.`tbl_clientes`
    ON (
      `tbl_pedidos`.`id_cliente` = `tbl_clientes`.`id`
    )WHERE tbl_pedidos.id = :id";

    try {

        $result = $conect->prepare($select);
        $result->bindParam(':id', $id_venda);
        $result->execute();

        $contar = $result->rowCount();

        if ($contar > 0) {
            while ($show = $result->fetch(PDO::FETCH_OBJ)) {
                $nome = $show->nome;
                $pedido = $show->pedido;
            }
        } else {
        }
    } catch (PDOException $e) {
        echo "<strong>ERRO DE SELECT NO PDO: </strong>" . $e->getMessage();
    }
}



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 style="color: #BC5050;">Cadastro de Vendas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" onmouseover="calculaDataFin()">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Nº Pedido:</label>
                                            <input type="text" class="form-control" name="id" id="id" value="<?php echo $id_venda ?>">
                                        </div>
                                        <div class="col-8">
                                            <label for="exampleInputPassword1">Nome:</label>
                                            <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>" required />
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="exampleInputEmail1">Data Venda:</label>
                                            <input type="text" class="form-control" name="dataVenda" id="dataVenda" required placeholder="Insira a Data" />
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputPassword1">Valor Final:</label>
                                            <input type="text" class="form-control" name="total" id="total" required placeholder="R$ 0.00" />
                                            
                                        </div>
                                        <div class="col-4">
                                            <label for="exampleInputPassword1">Valor Frete:</label>
                                            <input type="text" class="form-control" name="valor_frete" required placeholder="R$ 0.00" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="exampleInputEmail1">Pedido:</label>
                                            <textarea class="form-control" name="pedido" id="pedido" cols="30" rows="5"><?php echo $pedido ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <button type="submit" name="botao_venda" class="btn btn-primary btn-cadastrar" style="background-color: #BC5050; border:none;">Realizar Venda</button>
                                </div>
                        </form>
                        <?php
                        include_once('funcionalidades/Vendas/CadastroVenda.php');
                        ?>
                    </div>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->