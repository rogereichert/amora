<?php
  include_once('../includes/header.php');
    if(isset($_GET['acao'])){
      $acao = $_GET['acao'];
      if($acao == 'bemvindo'){
        include_once('../paginas/conteudo/principal.php');
      }elseif ($acao == 'editar'){
        include_once('../paginas/conteudo/update_cliente.php');
      }elseif ($acao == 'perfil'){
        include_once('../paginas/conteudo/perfil.php');
      }elseif ($acao == 'relatorio_cliente'){
        include_once('../paginas/conteudo/relatorio_cliente.php');
      }elseif ($acao == 'cadastrar_cliente'){
        include_once('../paginas/conteudo/cadastro_cliente.php');
      }elseif ($acao == 'cadastrar_produto'){
        include_once('../paginas/conteudo/cadastro_produto.php');
      }elseif ($acao == 'cadastrar_insumo'){
        include_once('../paginas/conteudo/cadastro_insumo.php');
      }
    }else{
      include_once('../paginas/conteudo/cadastro_cliente.php');
    }
  include_once('../includes/footer.php');
