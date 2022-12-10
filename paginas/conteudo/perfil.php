
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perfil do Usuário</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php

      ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary" style="height: 600px;">
            <div class="card-header" style="background-color: #E9BCBA;">
              <h3 class="card-title" style="color: #BC5050;">Editar Perfil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="Nome">Nome: </label>
                  <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario->getNome(); ?>">
                </div>
                <div class="form-group">
                  <label for="Usuário">Usuário: </label>
                  <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario->getUsuario(); ?>">
                </div>
                <div class="form-group">
                  <label for="Email">Endereço de E-mail:</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $usuario->getEmail(); ?>">
                </div>
                <div class="form-group">
                  <label for="Senha">Senha: </label>
                  <input type="password" class="form-control" name="senha" id="telefone" value="<?php $usuario->getSenha() ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Avatar do usuário</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto" id="foto">
                      <label class="custom-file-label" for="exampleInputFile" value="<?php echo $usuario->getFoto() ?>">Arquivo de imagem</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer cd-footer">
                <button type="submit" name="alterarPerfil" class="btn btn-primary btn-alterar">Alterar dados do usuário</button>
              </div>
            </form>

            <?php
            
            if(isset($_POST['alterarPerfil'])){
              require_once "funcionalidades/Perfil/alterarPerfil.php";
            }

            
          //   if (isset($_POST['alterarPerfil'])) {
              
          //     $usuario = new Usuario;

          //     $nome = $_POST['nome'];
          //     $usuario = $_POST['usuario'];
          //     $email = $_POST['email'];
          //     $senha = $_POST['senha'];

          //     //Verificar se existe imagem para fazer o upload
          //     if (!empty($_FILES['foto']['name'])) {
          //       $formatP = array("png", "jpg", "jpeg", "gif");
          //       $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

          //       if (in_array($extensao, $formatP)) {
          //         $pasta = "../img/server/";
          //         $temporario = $_FILES['foto']['tmp_name'];
          //         $novoNome = uniqid() . ".{$extensao}";

          //         if (move_uploaded_file($temporario, $pasta . $novoNome)) {
          //         } else {
          //           $mensagem = "Erro, não foi possivel fazer o upload do arquivo!";
          //         }
          //       } else {
          //         echo "Formato inválido";
          //       }
          //     } else {
          //       $foto_user = $_FILES['foto']['name'];
          //       $novoNome = $foto_user;
          //     }

          //     if(Empty($senha)){ 
          //       $usuario->setSenha($senha);
          //     }

            
          //     // $usuario->setDados($nome, $usuario, $senha, $novoNome, $email);
          //     // $usuario->setId($id_user);
          //     // $usuario->atualizarUsuario();

          //   }
          //   ?>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card" style="height: 600px;">
            <div class="card-header">
              <h3 class="card-title">Dados do Usuário</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="text-align: center; margin-bottom: 98px">
              <img src="../img/server/<?php echo $usuario->getFoto(); ?>" alt="<?php echo $usuario->getFoto(); ?>" title="<?php echo $usuario->getFoto(); ?>" style="width: 200px; border-radius: 100%; margin-top: 30px">
              <h1><?php echo $usuario->getNome(); ?></h1>
              <p>Usuário: <strong><?php echo $usuario->getUsuario(); ?></strong></p>

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