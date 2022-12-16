<?php

// function connection(){

//     $pdo = new PDO('mysql:host=localhost;dbname=teste', 'root', '');
//     return $pdo;

// }    

// function getData($table){

//     $connection = connection();
//     $query = $connection->query("select * from {$table}");
//     $query->execute();
//     return $query->fetchAll();
// }

// var_dump(getData('tbl_clientes'));

// Clousures
function teste($name){

    $person = function() use ($name){
        return $name;
    };

    return $person;
}

var_dump(teste('roger')());

?>