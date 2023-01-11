<?php

require '../config/conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $select = "SELECT id, pedido FROM tbl_pedidos WHERE id = :id LIMIT 1";
    
    try{

        $result = $conect->prepare($select);
        $result->bindParam(':id', $id);
        $result->execute();

        $row_pedido = $result->fetch(PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        echo $e->getMessage();
    }

}else{

}

echo json_encode($id);
     
