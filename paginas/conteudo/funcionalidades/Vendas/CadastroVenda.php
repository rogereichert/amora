<?php

if (isset($_POST['botao_venda'])) {

    require '../config/conexao.php';

    $id_pedido = $_POST['id'];
    $nome = $_POST['nome'];
    $data_venda = $_POST['dataVenda'];
    $valor_final = $_POST['total'];
    $valor_frete = $_POST['valor_frete'];

    $result = "INSERT INTO tbl_vendas(id_pedido, data_venda, valor_final, valor_frete) VALUES (:id_pedido, :data_venda, :valor_final, :valor_frete)";

    try {

        $result = $conect->prepare($result);
        $result->bindParam(':id_pedido', $id_pedido);
        $result->bindParam(':data_venda', $data_venda);
        $result->bindParam(':valor_final', $valor_final);
        $result->bindParam(':valor_frete', $valor_frete);

        $result->execute();
        $contar = $result->rowCount();

        if ($contar > 0) {
            echo '<div class="container">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> OK!</h5>
                                Venda Cadastrado com sucesso.
                            </div>
                        </div>';

            require_once(__DIR__ . '../../Pedidos/pedido.php');
            atualizarPedidos($id_pedido);
        } else {
            echo '<div class="container">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Erro!</h5>
                                Dados não inseridos !!!
                            </div>
                        </div>';
            header("Refresh: 5, home.php");
        }
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}
