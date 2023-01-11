  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Registro dos Pedidos</h1>
          </div>
          <div class="card-body">
            <section class="content">
              <div class="row">
                <div class="col-12">
                  <!-- /.card-header -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th>Nº Pedido</th>
                        <th>Cliente</th>
                        <th>Data Pedido</th>
                        <th>Data Entrega</th>
                        <th>Capa</th>
                        <th>Prioridade</th>
                        <th>Pedido</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      require "../config/conexao.php";
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
                        )WHERE status_pedido = 1";

                      try {
                        $result = $conect->prepare($select);
                        $cont = 1;
                        $result->execute();

                        $contar = $result->rowCount();
                        if ($contar > 0) {
                          while ($show = $result->FETCH(PDO::FETCH_OBJ)) {

                      ?>
                            <tr style="text-align: center;">
                              <td><?php echo $show->id; ?></td>
                              <td style="width: 15%;"><?php echo $show->nome ?></td>
                              <td><?php echo $show->data_pedido ?></td>
                              <td><?php echo $show->data_entrega ?></td>
                              <td><?php echo $show->capa ?></td>
                              <td><?php echo $show->prioridade ?></td>
                              <td style="width: 25%;"><?php echo $show->pedido ?></td>
                              <td style="margin-left: -200px;">
                                <a href="home.php?acao=cadastrar_venda&idVenda=<?php echo $show->id; ?>" onclick="return confirm('Deseja finalizar o pedido?')" class="btn btn-app bg-info"><i class="fas fa-truck"></i> Finalizar</a>
                                <a href="home.php?acao=cadastrar_venda&idVenda=<?php echo $show->id; ?>" onclick="return confirm('Deseja finalizar o pedido?')" class="btn btn-app bg-warning"><i class="fas fa-inbox"></i> Editar</a>
                              </td>
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
                        <th>Nº Pedido</th>
                        <th>Cliente</th>
                        <th>Data Pedido</th>
                        <th>Data Entrega</th>
                        <th>Capa</th>
                        <th>Prioridade</th>
                        <th>Pedido</th>
                        <th>Ações</th>
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

  <script>
    async function editarPedido(id) {
      //console.log("Editar " + id);

      const dados = await fetch('visualizar.php?id=' + id);
      const res = await dados.json();
    }
  </script>