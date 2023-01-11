<?php

function mostrarDados()
{
    include('../config/conexao.php');

    $select = "SELECT SUM(valor_acumulado) AS 'total' FROM tbl_caixa WHERE id = (SELECT MAX(id) FROM tbl_caixa)";

    try {

        $result = $conect->prepare($select);
        $result->execute();
        $contar = $result->rowCount();

        if ($contar > 0) {
            if ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                $teste = $show->total;
            }

            if ($teste == 0){
                $teste = 0.0;
            }
        }

        return $teste;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

