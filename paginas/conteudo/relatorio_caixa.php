  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="card">
                  <div class="card-header">
                      <h1 class="card-title">Relatório de Caixa</h1>
                  </div>
                  <div class="card-body">
                      <section class="content">
                          <div class="row">
                              <div class="col-12">
                                  <!-- /.card-header -->
                                  <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                          <tr style="text-align: center;">
                                              <th>Nº Lançamento</th>
                                              <th>Data Lançada</th>
                                              <th>Lançamento</th>
                                              <th>Categoria</th>
                                              <th>Descrição</th>
                                              <th>Valor</th>
                                              <th>Valor Acumulado Dia</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php
                                            require "../config/conexao.php";

                                            $select = "SELECT
                                            `tbl_caixa`.`id`,
                                            `tbl_tipo_lancamento`.`lancamento`,
                                            `tbl_categorias_fluxo`.`categoria`,
                                            `tbl_caixa`.`descricao`,
                                            `tbl_caixa`.`valor`,
                                            `tbl_caixa`.`data_pagamento_recebimento`,
                                            `tbl_caixa`.`valor_acumulado`
                                          FROM
                                            `amora`.`tbl_caixa`
                                            INNER JOIN `amora`.`tbl_tipo_lancamento`
                                              ON (
                                                `tbl_caixa`.`id_entrada` = `tbl_tipo_lancamento`.`id`
                                              )
                                            INNER JOIN `amora`.`tbl_categorias_fluxo`
                                              ON (
                                                `tbl_caixa`.`id_categoria` = `tbl_categorias_fluxo`.`id`
                                              );
                                          ";

                                            try {
                                                $result = $conect->prepare($select);
                                                $cont = 1;
                                                $result->execute();

                                                $contar = $result->rowCount();
                                                if ($contar > 0) {
                                                    while ($show = $result->FETCH(PDO::FETCH_OBJ)) {

                                            ?>
                                                      <tr>
                                                          <td style="width: 10%;"><?php echo $show->id; ?></td>
                                                          <td style="width: 10%;"><?php echo $show->data_pagamento_recebimento ?></td>
                                                          <td style="width: 10%;"><?php echo $show->lancamento ?></td>
                                                          <td style="width: 10%;"><?php echo $show->categoria ?></td>
                                                          <td style="width: 30%;"><?php echo $show->descricao ?></td>
                                                          <td style="width: 10%;"><?php echo $show->valor ?></td>
                                                          <td style="width: 15%;"><?php echo $show->valor_acumulado ?></td>

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
                                              <th>Nº Lançamento</th>
                                              <th>Data Lançada</th>
                                              <th>Lançamento</th>
                                              <th>Categoria</th>
                                              <th>Descrição</th>
                                              <th>Valor</th>
                                              <th>Valor Acumulado Dia</th>
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