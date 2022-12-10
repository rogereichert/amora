  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="card-title">Editar Cliente</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
        include('../config/conexao.php');
        if (!isset($_GET['id'])) {
          header("Location: home.php");
          exit;
        }
        $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

        $select = "SELECT * FROM tbl_clientes WHERE id=:id";
        try {
          $resultado = $conect->prepare($select);
          $resultado->bindParam(':id', $id, PDO::PARAM_INT);
          $resultado->execute();

          $contar = $resultado->rowCount();
          if ($contar > 0) {
            while ($show = $resultado->FETCH(PDO::FETCH_OBJ)) {
              $idCont = $show->id;
              $nome = $show->nome;
              $whats = $show->whats;
              $email = $show->email;
              $foto = $show->foto;
            }
          } else {
            echo '<div class="alert alert-danger">Não há dados com o id informado!</div>';
          }
        } catch (PDOException $e) {
          echo "<strong>ERRO DE SELECT NO PDO: </strong>" . $e->getMessage();
        }
        ?>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dados do Cliente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="text-align: center; margin-bottom: 98px">
                <?php 
                  if (empty($foto)){
                    $foto = "63949cffb80eb.jpg";
                  }
                ?>
                <img src="../img/server/<?php echo $foto; ?>" alt="<?php echo $foto; ?>" title="<?php echo $foto; ?>" style="width: 200px; border-radius: 100%; margin-top: 30px">
                <h1><?php echo $nome; ?></h1>
                <strong>Whats: </strong><span><?php echo $whats; ?></span>
                <p><?php echo $email; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">editar contato</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" required value="<?php echo $nome; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Whats</label>
                    <input type="text" class="form-control" name="whats" id="whats" required value="<?php echo $whats; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required value="<?php echo $email; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Foto do contato</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto" id="foto">
                        <label class="custom-file-label" for="exampleInputFile">Arquivo de imagem</label>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="upContato" class="btn btn-primary">Finalizar edição do contato</button>
                </div>
              </form>
              <?php
              if (isset($_POST['upContato'])) {
                $nome = $_POST['nome'];
                $whats = $_POST['whats'];
                $email = $_POST['email'];
                //Verificar se existe imagem para fazer o upload
                if (!empty($_FILES['foto']['name'])) {
                  $formatP = array("png", "jpg", "jpeg", "gif");
                  $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                  if (in_array($extensao, $formatP)) {
                    $pasta = "../img/server/";
                    $temporario = $_FILES['foto']['tmp_name'];
                    $novoNome = uniqid() . ".{$extensao}";

                    if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                    } else {
                      $mensagem = "Erro, não foi possivel fazer o upload do arquivo!";
                    }
                  } else {
                    echo "Formato inválido";
                  }
                } else {
                  $novoNome = $foto;
                }

                $update = "UPDATE tbl_clientes SET nome=:nome,whats=:whats,email=:email,foto=:foto WHERE id=:id";
                try {
                  $result = $conect->prepare($update);
                  $result->bindParam(':id', $id, PDO::PARAM_STR);
                  $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                  $result->bindParam(':whats', $whats, PDO::PARAM_STR);
                  $result->bindParam(':email', $email, PDO::PARAM_STR);
                  $result->bindParam(':foto', $novoNome, PDO::PARAM_STR);
                  $result->execute();
                  // alerte abaixo
                  $contar = $result->rowCount();
                  if ($contar > 0) {
                    echo '<div class="container">
                                <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-check"></i> Ok !!!</h5>
                                  Os dados foram atualizados com sucesso.
                                </div>
                                </div>';
                    header("Refresh: 2, home.php");
                  } else {
                    echo '<div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-check"></i> Erro !!!</h5>
                                  Não foi possível atualizar os dados.
                                </div>';
                  }
                } catch (PDOException $e) {
                  echo "<strong>ERRO DE PDO= </strong>" . $e->getMessage();
                }
              }
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