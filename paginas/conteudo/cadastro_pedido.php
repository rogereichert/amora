  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col">
                      <h1 style="color: #BC5050;">Cadastro de Pedidos</h1>
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
                                          <div class="col-10">
                                              <label for="exampleInputEmail1">Nome:</label>
                                              <input type="text" class="form-control" name="nome" id="nome" required placeholder="Digite um nome">
                                          </div>
                                          <div class="col-2">
                                              <label for="id">Número Pedido:</label>
                                              <input type="text" class="form-control" name="id" id="id" disabled>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="row">
                                          <div class="col-6">
                                              <label for="exampleInputEmail1">Data Pedido:</label>
                                              <input type="date" class="form-control" name="data" id="data" required placeholder="Digite um nome">
                                          </div>
                                          <div class="col-6">
                                              <label for="exampleInputPassword1">Data Entrega:</label>
                                              <input type="date" class="form-control" name="datafin" id="datafin" onmouseover="calculaDataFin()" readonly />
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="row">
                                          <div class="col-6">
                                              <label>Capa:</label>
                                              <select class="custom-select">
                                                  <option>Capa Holográfica</option>
                                                  <option>Capa Fosco</option>
                                                  <option>Capa Brilhante</option>
                                              </select>
                                          </div>

                                          <div class="col-6">
                                              <label>Prioridade:</label>
                                              <select class="custom-select">
                                                  <option>Urgente</option>
                                                  <option>Prazo Comum</option>
                                                  <option>Sem Prazo</option>
                                              </select>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="form-group">
                                      <div class="row">
                                          <div class="col-12">
                                              <label for="exampleInputEmail1">Pedido:</label>
                                              <textarea class="form-control" name="pedido" id="pedido" cols="30" rows="5"></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="card">
                                      <button type="submit" name="botao" class="btn btn-primary btn-cadastrar" style="background-color: #BC5050; border:none;">Cadastrar Pedido </button>
                                  </div>
                          </form>
                          <?php
                            include_once('funcionalidades/Pedidos/pedido.php');
                          ?>
                          <div class="form-group">
                              <p>
                                  <?php
                                    if (isset($_POST['nome'])) {
                                        $datafin = $_POST['datafin'];
                                        echo $datafin . " - " . "  ";
                                        echo "Data de inicio: " . date("d/m/Y", strtotime($datafin));
                                    }
                                    ?>
                              </p>
                              <p>
                                  <?php
                                    if (isset($_POST['nome'])) {
                                        $data = $_POST['data'];
                                        echo $data . " - " . "  ";
                                        echo "Data de fim: " . date("d/m/Y", strtotime($data));
                                    }
                                    ?>
                              </p>
                          </div>
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