<?php

if (isset($_POST['botao'])) {

    require '../config/conexao.php';

    //$nome = $_POST['nome'];
    $data_pedido = date("d/m/Y", strtotime($_POST['data']));
    $data_entrega = date("d/m/Y", strtotime($_POST['datafin']));
    $capa = $_POST['capa'];
    $prioridade = $_POST['prioridade'];
    $pedido = $_POST['pedido'];
    $id_cliente = $_POST['nome'];

    $cadastro = "INSERT INTO tbl_pedidos (data_pedido, data_entrega, capa, prioridade, pedido, id_cliente) VALUES (:data_pedido, :data_entrega, :capa, :prioridade, :pedido, :id_cliente)";

    try {

        $result = $conect->prepare($cadastro);
        //$result->bindParam(':nome', $nome, PDO::PARAM_STR);
        $result->bindParam(':data_pedido', $data_pedido, PDO::PARAM_STR);
        $result->bindParam(':data_entrega', $data_entrega, PDO::PARAM_STR);
        $result->bindParam('capa', $capa, PDO::PARAM_STR);
        $result->bindParam(':prioridade', $prioridade, PDO::PARAM_STR);
        $result->bindParam(':pedido', $pedido, PDO::PARAM_STR);
        $result->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

        $result->execute();
        $contar = $result->rowCount();

        if ($contar > 0) {
            echo '<div class="container">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> OK!</h5>
                            Pedido Cadastrado com sucesso.
                        </div>
                    </div>';
            mostrarDados();
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
}else{
    
}

function atualizarPedidos($id_pedido)
{

    require '../config/conexao.php';

    $update = "UPDATE tbl_pedidos SET status_pedido = 2 WHERE id = :id_pedido";

    try {

        $result = $conect->prepare($update);
        $result->bindParam(':id_pedido', $id_pedido, PDO::PARAM_INT);
        $result->execute();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function mostrarDados()
    {
        include('../config/conexao.php');

        $select = "SELECT id FROM tbl_pedidos ORDER BY id DESC LIMIT 1";
        try {

            $result = $conect->prepare($select);
            $result->execute();
            $contar = $result->rowCount();

        if ($contar > 0) {
            if ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                $teste = $show->id;
            }
        }

          return $teste + 1;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
