<?php

class Usuario
{

    private $id;
    private $nome;
    private $usuario;
    private $senha;
    private $foto;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * 
     * setDados RESPONSÁVEL POR SETAR OS DADOS NA FUNÇÃO SET
     */
    public function setDados($nome, $usuario, $senha, $foto, $email)
    {

        $this->setNome($nome);
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setFoto($foto);
        $this->setEmail($email);
    }

    // MÉTODO RESPONSÁVEL POR CADASTRAR UM USUÁRIO
    public function cadastrarUsuario()
    {

        require 'config/conexao.php';

        $cadastro = "INSERT INTO tbl_usuarios(foto,nome,usuario,senha,email) VALUES (:foto,:nome,:usuario,:senha,:email)";
        try {


            $nome = $this->getNome();
            $usuario = $this->getUsuario();
            $senha = $this->getSenha();
            $foto = $this->getFoto();
            $email = $this->getEmail();

            $result = $conect->prepare($cadastro);
            $result->bindParam(':nome', $nome, PDO::PARAM_STR);
            $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $result->bindParam(':senha', $senha, PDO::PARAM_STR);
            $result->bindParam(':foto', $foto, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->execute();

            $contar = $result->rowCount();
            if ($contar > 0) {
                echo '<div class="container">
                                    <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> OK!</h5>
                                    Dados inseridos com sucesso !!!
                                  </div>
                                </div>';
                header("Refresh: 1, index.php");
            } else {
                echo '<div class="container">
                                        <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-check"></i> Erro!</h5>
                                        Dados não inseridos !!!
                                      </div>
                                    </div>';
            }
        } catch (PDOException $e) {
            echo "<strong>ERRO DE PDO= </strong>" . $e->getMessage();
        }
    }

    /**
     * logarUsuario()
     * FUNÇÃO RESPONSÁVEL PELO LOGIN DO USUÁRIO
     */
    public function logarUsuario()
    {

        require 'config/conexao.php';

        $select = "SELECT * FROM tbl_usuarios WHERE usuario=:usuarioLogin AND senha=:senhaLogin";

        try {

            $login = $this->getUsuario();
            $senha = $this->getSenha();

            $resultLogin = $conect->prepare($select);
            $resultLogin->bindParam(':usuarioLogin', $login, PDO::PARAM_STR);
            $resultLogin->bindParam(':senhaLogin', $senha, PDO::PARAM_STR);
            $resultLogin->execute();

            $verificar = $resultLogin->rowCount();

            if ($verificar > 0) {

                //CRIAR SESSÂO DO USUÁRIO
                // $_SESSION['loginUser'] = $login;
                // $_SESSION['senhaUser'] = $senha;
                // $_SESSION['idLogin'] = $id;

                foreach ($resultLogin as $row) {
                    $_SESSION['loginUser'] = $row['usuario'];
                    $_SESSION['senhaUser'] = $row['senha'];
                    $_SESSION['idUser'] = $row['id'];
                }

                echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Logado com sucesso!</strong> Você será redirecionado para a agenda :)</div>';

                header("Refresh: 2, paginas/home.php?acao=bemvindo");
            } else {

                echo '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Erro!</strong> login ou senha incorretos, digite outro login ou 
                faça o cadastro se ainda não tiver :(</div>';
                header("Refresh: 7, index.php");
            }
        } catch (PDOException $e) {

            echo "ERROR: " . $e->getMessage();
        }
    }

    public function mostrarDadosUsuario()
    {

        require '../config/conexao.php';

        $select = "SELECT * FROM tbl_usuarios WHERE usuario=:usuarioLogin AND senha=:senhaLogin";

        try {

            $login = $this->getUsuario();
            $senha = $this->getSenha();

            $resultadoUser = $conect->prepare($select);
            $resultadoUser->bindParam(':usuarioLogin', $login, PDO::PARAM_STR);
            $resultadoUser->bindParam(':senhaLogin', $senha, PDO::PARAM_STR);
            $resultadoUser->execute();

            $contar = $resultadoUser->rowCount();

            if ($contar > 0) {

                while ($show = $resultadoUser->FETCH(PDO::FETCH_OBJ)) {

                    $id = $show->id;
                    $foto = $show->foto;
                    $email = $show->email;
                    $nome = $show->nome;

                    $this->setId($id);
                    $this->setFoto($foto);
                    $this->setEmail($email);
                    $this->setNome($nome);
                }
            } else {

                echo '<div class="alert alert-danger"> <strong>Aviso!</strong> Não há dados com de perfil :(</div>';
            }
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function mostrarDadosUsuarioPerfil($id)
    {

        require '../config/conexao.php';

        $select = "SELECT * FROM tbl_usuarios WHERE usuario=:usuarioLogin AND senha=:senhaLogin AND id={$id} ";

        try {

            $login = $this->getUsuario();
            $senha = $this->getSenha();

            $resultadoUser = $conect->prepare($select);
            $resultadoUser->bindParam(':usuarioLogin', $login, PDO::PARAM_STR);
            $resultadoUser->bindParam(':senhaLogin', $senha, PDO::PARAM_STR);
            $resultadoUser->execute();

            $contar = $resultadoUser->rowCount();

            if ($contar > 0) {

                while ($show = $resultadoUser->FETCH(PDO::FETCH_OBJ)) {

                    $id = $show->id;
                    $foto = $show->foto;
                    $email = $show->email;
                    $nome = $show->nome;

                    $this->setId($id);
                    $this->setFoto($foto);
                    $this->setEmail($email);
                    $this->setNome($nome);
                }
            } else {

                echo '<div class="alert alert-danger"> <strong>Aviso!</strong> Não há dados com de perfil :(</div>';
            }
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function atualizarUsuario()
    {

        require '../config/conexao.php';

        $update = "UPDATE tbl_usuarios SET foto=:foto,nome=:nome,usuario=:usuario,email=:email,senha=:senha WHERE id=:id";

        try {

            $id_user = $this->getId();
            $foto = $this->getFoto();
            $nome = $this->getNome();
            $usuario = $this->getUsuario();
            $email = $this->getEmail();
            $senha = $this->getSenha();

            $result = $conect->prepare($update);
            $result->bindParam(':id', $id_user, PDO::PARAM_STR);
            $result->bindParam(':foto', $foto, PDO::PARAM_STR);
            $result->bindParam(':nome', $nome, PDO::PARAM_STR);
            $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':senha', $senha, PDO::PARAM_STR);
            $result->execute();

            $contar = $result->rowCount();

            if ($contar > 0) {

                echo '<div class="container">
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Ok !!!</h5>
                            Perfil atualizados com sucesso.
                          </div>
                          </div>';
                header("Refresh: 2, home.php");
            } else {

                echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Erro !!!</h5>
                            Perfil não foi atualizar.
                          </div>';
            }
        } catch (PDOException $e) {

            echo "<strong>ERRO DE PDO= </strong>" . $e->getMessage();
        }
    }
}
