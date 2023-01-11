<?php

require 'DadosCaixa.php';

if (isset($_POST['botao'])) {

    require '../config/conexao.php';

    $data_pagamento = date("d/m/Y", strtotime($_POST['dataLancamento']));;
    $tipo_lancamento = $_POST['lancamento'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    if ($tipo_lancamento == 2) {
        $valor = $valor * -1;
    }

    $cadastrarLancamento = "INSERT INTO tbl_caixa (data_pagamento_recebimento, id_entrada, id_categoria, descricao, valor) 
        VALUES (:data_pagamento_recebimento, :id_entrada, :id_categoria, :descricao, :valor)";

    try {

        $result = $conect->prepare($cadastrarLancamento);

        $result->bindParam(':data_pagamento_recebimento', $data_pagamento, PDO::PARAM_STR);
        $result->bindParam(':id_entrada', $tipo_lancamento, PDO::PARAM_INT);
        $result->bindParam(':id_categoria', $categoria, PDO::PARAM_INT);
        $result->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $result->bindParam(':valor', $valor, PDO::PARAM_INT);

        $result->execute();
        $contar = $result->rowCount();

        if ($contar > 0) {
            echo '<div class="container">
            <div class="alert alert-success alert-dismissible" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> OK!</h5>
            Lançamento Cadastrado com sucesso.
        </div>
            </div>';

            calcularDados();
            $idObtido = obtemUltimoIdInserido();
            updateValorAcumulado($idObtido);
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


function calcularDados()
{
    include('../config/conexao.php');

    $select = "SELECT SUM(valor) AS 'total' FROM tbl_caixa";

    try {

        $result = $conect->prepare($select);
        $result->execute();
        $contar = $result->rowCount();

        if ($contar > 0) {
            if ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                $valorFinal = $show->total;
            }

            if ($valorFinal == 0) {
                $valorFinal = 0.0;
            }
        }

        return $valorFinal;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function obtemUltimoIdInserido()
{

    require '../config/conexao.php';

    $select = "SELECT MAX(id) AS 'idUpdate' FROM tbl_caixa;";

    try {

        $result = $conect->prepare($select);
        $result->execute();
        $contar = $result->rowCount();

        if ($contar > 0) {
            if ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                $id = $show->idUpdate;
            }
        }

        return $id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateValorAcumulado($id)
{
    require '../config/conexao.php';

    $valor = calcularDados();
    $update = "UPDATE tbl_caixa SET valor_acumulado = '$valor' WHERE id = '$id'";

    try {

        $result = $conect->prepare($update);
        $result->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
