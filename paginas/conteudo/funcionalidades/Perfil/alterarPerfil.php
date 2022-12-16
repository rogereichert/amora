<?php

    if (isset($_POST['alterarPerfil'])){
        
        $user = new Usuario;

        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $id = $_SESSION['idUser'];

        // $formatP = array("png", "jpg", "jpeg", "JPG", "gif");
        // $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

        // if (in_array($extensao, $formatP)) {

        //   $pasta = "img/server/";
        //   $temporario = $_FILES['foto']['tmp_name'];
        //   $novoNome = uniqid() . ".$extensao";

        //   $user->setDados($nome, $usuario, $senha, $novoNome, $email);
        //   $user->cadastrarUsuario();

        //   if (move_uploaded_file($temporario, $pasta . $novoNome)) {
        //   } else {
        //     echo "Erro, não foi possível fazer o upload do arquivo!";
        //   }
        // } else {
        //   $img = 'img/amora1.png';
        //   $user->setDados($nome, $usuario, $senha, $img, $email);
        //   $user->cadastrarUsuario();
        // }
    }



?>