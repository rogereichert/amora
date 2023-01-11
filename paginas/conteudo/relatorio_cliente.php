  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Registro dos Clientes</h1>
          </div>
          
          <div class="card-body">
            <section class="content">
              <div class="row">
                <div class="col-12">
                  <!-- /.card-header -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr style="text-align: center;">
                        <th>Código</th>
                        <th>Nome do Cliente</th>
                        <th>Whats</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
                        <th>Observações</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      require "../config/conexao.php";
                      $select = "SELECT * FROM tbl_clientes ORDER BY id DESC";
                      try {
                        $result = $conect->prepare($select);
                        $cont = 1;
                        $result->execute();

                        $contar = $result->rowCount();
                        if ($contar > 0) {
                          while ($show = $result->FETCH(PDO::FETCH_OBJ)) {

                      ?>
                            <tr>
                              <td><?php echo $show->id; ?></td>
                              <td><?php echo $show->nome ?></td>
                              <td><?php echo $show->whats ?></td>
                              <td><?php echo $show->email ?></td>
                              <td><?php echo $show->endereco ?></td>
                              <td><?php echo $show->observacoes ?></td>
                              <td>

                                <a href="home.php?acao=editar&id=<?php echo $show->id; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit" style="padding: 0.500rem; margin: 0rem 0.225rem;"></i></a>
                                <a href="conteudo/del-contato.php?idDel=<?php echo $show->id; ?>" onclick="return confirm('Deseja remover o contato')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Deletar"><i class="fa fa-trash" style="padding: 0.500rem; margin: 0rem 0.300rem;"></i></a>

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
                        <th style="text-align: center;">Código</th>
                        <th>Nome do Cliente</th>
                        <th>Whats</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Observações</th>
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