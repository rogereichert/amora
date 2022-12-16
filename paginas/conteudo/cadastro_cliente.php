  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: #BC5050;">Cadastro de Clientes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #E9BCBA; color: #BC5050">
                <h3 class="card-title">Cadastrar Clientes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" required placeholder="Digite um nome">
                      </div>
                      <div class="col-6">
                        <label for="exampleInputPassword1">Whats:</label>
                        <input type="text" class="form-control" name="whats" id="whats" required placeholder="(00) 00000-0000">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-3">
                        <label for="exampleInputEmail1">Cep:</label>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="Cep">
                      </div>
                      <div class="col-6">
                        <label for="exampleInputPassword1">Bairro:</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
                      </div>
                      <div class="col-3">
                        <label for="exampleInputPassword1">Número:</label>
                        <input type="text" class="form-control" name="numero" id="numero" placeholder="Número">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
                      </div>
                      <div class="col-3">
                        <label for="exampleInputPassword1">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                      </div>
                      <div class="col-3">
                        <label for="exampleInputPassword1">Estado:</label>
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="UF">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <label for="exampleInputEmail1">Como conheceu:</label>
                        <input type="text" class="form-control" name="origem" id="origem" placeholder="Origem">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Aniversário:</label>
                        <input type="text" class="form-control" name="aniversario" id="aniversario" placeholder="Aniversário">
                      </div>
                      <div class="col-6">
                        <label for="exampleInputPassword1">CPF:</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <label for="exampleInputEmail1">Preferências:</label>
                        <textarea class="form-control" name="preferencias" id="preferencias" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <label for="exampleInputEmail1">Observações:</label>
                        <textarea class="form-control" name="observacoes" id="observacoes" cols="30" rows="3"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Foto do Cliente</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="foto">
                        <label class="custom-file-label" for="exampleInputFile">Arquivo de imagem</label>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <button type="submit" name="botao" class="btn btn-primary btn-cadastrar" style="background-color: #BC5050; border:none;">Cadastrar Cliente</button>
                  </div>
              </form>
              <?php
              include_once('funcionalidades/Cliente/CadastroCliente.php');
              ?>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="background-color: #E9BCBA; color: #BC5050">
                <h3 class="card-title">Clientes Recentes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow-x:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">Ações</th>
                      <th>Nome</th>
                      <th>whats</th>
                      <th>Cep</th>
                      <th>Endereço</th>
                      <th>Bairro</th>
                      <th>Número</th>
                      <th>Cidade</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require "../config/conexao.php";
                    $select = "SELECT * FROM tbl_clientes ORDER BY id DESC LIMIT 5";
                    try {
                      $result = $conect->prepare($select);
                      $cont = 1;
                      $result->execute();
                      $contar = $result->rowCount();
                      if ($contar > 0) {
                        while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                          <tr>
                            <td><?php echo $cont++; ?></td>
                            <td>
                              <div class="btn-group">
                                <a href="home.php?acao=editar&id=<?php echo $show->id; ?>" class="btn btn-success" title="Editar Contato"><i class="fas fa-user-edit"></i></button>
                                  <a href="conteudo/del-contato.php?idDel=<?php echo $show->id; ?>" onclick="return confirm('Deseja remover o contato')" class="btn btn-danger" title="Remover Contato"><i class="fas fa-user-times"></i></a>
                              </div>
                            </td>

                            <td><?php echo $show->nome; ?></td>
                            <td>
                              <?php echo $show->whats; ?>
                            </td>
                            <td>
                              <?php echo $show->cep; ?>
                            </td>
                            <td>
                              <?php echo $show->endereco; ?>
                            </td>
                            <td>
                              <?php echo $show->bairro; ?>
                            </td>
                            <td>
                              <?php echo $show->numero; ?>
                            </td>
                            <td>
                              <?php echo $show->cidade; ?>
                            </td>
                            <td>
                              <?php echo $show->estado; ?>
                            </td>
                          </tr>
                    <?php
                        }
                      } else {
                      }
                    } catch (PDOException $e) {
                      echo '<strong>ERRO DE PDO= </strong>' . $e->getMessage();
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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