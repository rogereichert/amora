<?php

  include_once('../config/conexao.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: #BC5050;">Cadastro Insumos/Materiais/SKUs</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card card-primary card-outline card-tabs" style="border-top: 3px solid #B95451;">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Insumos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Produtos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">SKUS</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <form role="form" action="" method="post">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="Insumo">Insumo:</label>
                          <input type="text" class="form-control" name="insumo" id="insumo" required placeholder="Exemplo: Sulfite">
                        </div>
                        <div class="col-6">
                          <label for="Quantidade">Quantidade:</label>
                          <input type="text" class="form-control" name="whats" id="whats" placeholder="Exemplo: 10">
                        </div>
                      </div> <!-- end row -->
                    </div> <!-- end Form group -->

                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <!-- select -->
                          <div class="form-group">
                            <label>Tipo</label>
                            <select class="custom-select">
                              <option>Caixa</option>
                              <option>Bisnaga</option>
                              <option>Rolo</option>
                              <option>Bobina</option>
                              <option>Pacote</option>>
                            </select>
                          </div>
                        </div>
                        <div class="col">
                          <!-- select -->
                          <div class="form-group">
                            <label>Ativo:</label>
                            <select class="custom-select">
                              <option>Sim</option>
                              <option>Não</option>
                            </select>
                          </div>
                        </div>
                      </div> <!-- end row -->
                    </div> <!-- end Form group -->
                    <div class="card">
                      <button type="submit" name="cadastrar_insumo" class="btn btn-primary btn-cadastrar" style="background-color: #BC5050; border:none;">Cadastrar Insumo</button>
                    </div>
                  </form> <!-- end Form -->
                </div> <!-- end Tab1 -->

                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                  Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                  Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                </div>
              </div>
            </div>
            <!-- /.card -->
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