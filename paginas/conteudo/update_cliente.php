<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="card-title">Editar Cliente</h1>
        </div>
      </div>
  </section>

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
            $endereco = $show->endereco;
            $foto = $show->foto;
          }
        } else {
          echo '<div class="alert alert-danger">Não há dados com o id informado!</div>';
        }
      } catch (PDOException $e) {
        echo "<strong>ERRO DE SELECT NO PDO: </strong>" . $e->getMessage();
      }
      ?>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Dados do Cliente</h3>
        </div>
        <div class="card-body" style="text-align: center;">

          <?php
          if (empty($foto)) {
            $foto = "63949cffb80eb.jpg";
          }

          ?>

          <img src="../img/server/<?php echo $foto; ?>" alt="<?php echo $foto; ?>" title="<?php echo $foto; ?>" style="width: 200px; border-radius: 100%; margin-top: 30px">

          <div class="dados" style="display: flex; flex-direction: column;">
            <h1><?php echo $nome; ?></h1>
            <?php echo "Whats: " .  $whats; ?>
            <strong>Endreço: </strong><?php echo $endereco; ?>
          </div>
        </div>

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
              <input type="text" class="form-control" name="endereco" id="endereco" required value="<?php echo $endereco; ?>">
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

          <div class="card-footer">
            <button type="submit" name="upContato" class="btn btn-primary">Atualizar dados</button>
          </div>
        </form>
      </div>

    </div>
  </section>
</div>