<?php

// require 'funcionalidades/Pedidos/pedido.php';
require '../config/conexao.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 style="color: #BC5050;">Movimentação Caixa</h1>
                    <?php include_once('funcionalidades/Caixa/CadastroCaixa.php'); ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section>
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
                                        <div class="col-12">
                                            <label class="labelTotal" for="exampleInputEmail1">Valor em caixa: R$ <?php 
                                           
                                            echo mostrarDados()?> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleInputEmail1">Data Pedido:</label>
                                            <input type="date" class="form-control" name="dataLancamento" id="dataLancamento" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Tipo de Lançamento:</label>
                                            <select class="custom-select" name="lancamento" id="lancamento">
                                                <?php

                                                $select = "SELECT * FROM tbl_tipo_lancamento";

                                                try {

                                                    $result = $conect->prepare($select);
                                                    $result->execute();
                                                    $contar = $result->rowCount();

                                                    if ($contar > 0) {
                                                        while ($show = $result->FETCH(PDO::FETCH_OBJ)) {

                                                ?>
                                                            <option value="<?php echo $show->id ?>"><?php echo $show->lancamento ?></option>
                                                <?php
                                                        }
                                                    }
                                                } catch (PDOException $e) {

                                                    $e->getMessage();
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label>Categoria:</label>
                                            <select class="custom-select" name="categoria" id="categoria">
                                                <?php

                                                $select = "SELECT * FROM tbl_categorias_fluxo";

                                                try {

                                                    $result = $conect->prepare($select);
                                                    $result->execute();
                                                    $contar = $result->rowCount();

                                                    if ($contar > 0) {
                                                        while ($show = $result->FETCH(PDO::FETCH_OBJ)) {

                                                ?>
                                                            <option value="<?php echo $show->id ?>"><?php echo $show->categoria ?></option>
                                                <?php
                                                        }
                                                    }
                                                } catch (PDOException $e) {

                                                    $e->getMessage();
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label>Valor R$:</label>
                                            <input type="text" class="form-control" name="valor" id="valor" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="exampleInputEmail1">Descrição:</label>
                                            <textarea class="form-control" name="descricao" id="descricao" cols="20" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <button type="submit" name="botao" class="btn btn-primary btn-cadastrar" style="background-color: #BC5050; border:none;">Cadastrar Lançamentos </button>
                                </div>
                        </form>
                        <?php
                        include_once('funcionalidades/Caixa/CadastroCaixa.php');
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