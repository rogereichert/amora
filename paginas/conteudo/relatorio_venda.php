  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="card">
                  <div class="card-header">
                      <h1 class="card-title">Histórico de Vendas</h1>
                  </div>
                  <div class="card-body">
                      <section class="content">
                          <div class="row">
                              <div class="col-12">
                                  <!-- /.card-header -->
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr style="text-align: center;">
                                              <th>Nº Venda</th>
                                              <th>Cliente</th>
                                              <th>Data Venda</th>
                                              <th>Capa</th>
                                              <th>Pedido</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php
                                            require "../config/conexao.php";

                                            $select = "SELECT
                                            `tbl_vendas`.`id`,
                                            `tbl_clientes`.`nome`,
                                            `tbl_vendas`.`data_venda`,
                                            `tbl_pedidos`.`capa`,
                                            `tbl_pedidos`.`pedido`
                                          FROM
                                            `amora`.`tbl_vendas`
                                            INNER JOIN `amora`.`tbl_pedidos`
                                              ON (
                                                `tbl_vendas`.`id_pedido` = `tbl_pedidos`.`id`
                                              )
                                            INNER JOIN `amora`.`tbl_clientes`
                                              ON (
                                                `tbl_pedidos`.`id_cliente` = `tbl_clientes`.`id`
                                              )ORDER BY id DESC";

                                            try {
                                                $result = $conect->prepare($select);
                                                $cont = 1;
                                                $result->execute();

                                                $contar = $result->rowCount();
                                                if ($contar > 0) {
                                                    while ($show = $result->FETCH(PDO::FETCH_OBJ)) {

                                            ?>
                                                      <tr>
                                                          <td style="width: 7%;"><?php echo $show->id; ?></td>
                                                          <td style="width: 20%;"><?php echo $show->nome ?></td>
                                                          <td style="width: 10%;"><?php echo $show->data_venda ?></td>
                                                          <td style="width: 10%;"><?php echo $show->capa ?></td>
                                                          <td style="width: 30%;"><?php echo $show->pedido ?></td>

                                                      </tr>

                                          <?php

                                                    } // fim do while
                                                } // fim do if
                                            } catch (PDOException $e) {
                                                echo '<strong>ERRO DE PDO= </strong>' . $e->getMessage();
                                            }

                                            ?>

                                      </tbody>
                                      <tfoot>
                                          <tr style="text-align: center;">
                                              <th>Nº Venda</th>
                                              <th>Cliente</th>
                                              <th>Data Venda</th>
                                              <th>Capa</th>
                                              <th>Pedido</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </section>
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.col -->
          </div>
          <!-- /.container-fluid -->
      </section>
  </div>