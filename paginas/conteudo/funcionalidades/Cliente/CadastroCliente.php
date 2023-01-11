<?php

require('../app/classes/Cliente.php');
$cliente = new Cliente;

if (isset($_POST['botao'])) {

    $cliente->setNome($_POST['nome']);
    $cliente->setWhats($_POST['whats']);
    $cliente->setCep($_POST['cep']);
    $cliente->setBairro($_POST['bairro']);
    $cliente->setNumero($_POST['numero']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setCidade($_POST['cidade']);
    $cliente->setEstado($_POST['estado']);
    $cliente->setOrigem($_POST['origem']);
    $cliente->setAniversario($_POST['aniversario']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setPreferencias($_POST['preferencias']);
    $cliente->setObservacoes($_POST['observacoes']);

    $formatP = array("png", "jpg", "jpeg", "JPG", "gif");
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    if (!empty(in_array($extensao, $formatP))) {

        if (in_array($extensao, $formatP)) {

            $pasta = "../img/server/";
            $temporario = $_FILES['foto']['tmp_name'];
            $novoNome = uniqid() . ".$extensao";
            
            if (move_uploaded_file($temporario, $pasta . $novoNome)) {

                try {

                    $cliente->setFoto($novoNome);
                    $cliente->createClient();
                } catch (PDOException $e) {

                    echo $e->getMessage();
                }
            } else {
                echo "Erro, não foi possível fazer o upload do arquivo!";
            }
        } else {
            echo "Formato Inválido " . $extensao;
        }
    } else {
        try {
            $novoNome = "63949cffb80eb.jpg";
            $cliente->setFoto($novoNome);
            $cliente->createClient();
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
}
