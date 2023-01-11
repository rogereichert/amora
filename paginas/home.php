<?php
include_once('../includes/header.php');
if (isset($_GET['acao'])) {
  $acao = $_GET['acao'];
  if ($acao == 'bemvindo') {
    include_once('../paginas/conteudo/principal.php');
  } elseif ($acao == 'editar') {
    include_once('../paginas/conteudo/update_cliente.php');
  } elseif ($acao == 'perfil') {
    include_once('../paginas/conteudo/perfil.php');
  } elseif ($acao == 'relatorio_cliente') {
    include_once('../paginas/conteudo/relatorio_cliente.php');
  } elseif ($acao == 'cadastrar_cliente') {
    include_once('../paginas/conteudo/cadastro_cliente.php');
  } elseif ($acao == 'cadastrar_produto') {
    include_once('../paginas/conteudo/cadastro_produto.php');
  } elseif ($acao == 'cadastrar_insumo') {
    include_once('../paginas/conteudo/cadastro_insumo.php');
  } elseif ($acao == 'cadastrar_pedido') {
    include_once('../paginas/conteudo/cadastro_pedido.php');
  } elseif ($acao == 'relatorio_pedido') {
    include_once('../paginas/conteudo/relatorio_pedido.php');
  } elseif ($acao == 'teste') {
    include_once('../paginas/conteudo/teste.php');
  } elseif ($acao == 'cadastrar_venda') {
    include_once('../paginas/conteudo/cadastro_venda.php');
  } elseif ($acao == 'relatorio_venda') {
    include_once('../paginas/conteudo/relatorio_venda.php');
  } elseif ($acao == 'cadastrar_caixa') {
    include_once('../paginas/conteudo/cadastro_caixa.php');
  } elseif ($acao == 'relatorio_caixa') {
    include_once('../paginas/conteudo/relatorio_caixa.php');
  }

} else {
  include_once('../paginas/conteudo/cadastro_cliente.php');
}
include_once('../includes/footer.php');
