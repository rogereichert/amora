<?php

include('../../config/conexao.php');
if(isset($_GET['idDel'])){
    $id = $_GET['idDel'];
    $delete = "DELETE FROM tbl_clientes WHERE id=:id";

    try{

        $result = $conect->prepare($delete);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $contar = $result->rowCount();
        if($contar>0){
            ?>
            <div class="alert alert-sucess" role="alert">
                Excluído com sucesso
            </div>

            <?php
            //header("Location: ../home.php?acao=relatorio_cliente");
        }else{
            echo 'erro';
            //header("Location: ../home.php");
            
        }

    }catch(PDOException $e){
        echo "<strong>ERRO DE DELETE: </strong>".$e->getMessage();
    }
}