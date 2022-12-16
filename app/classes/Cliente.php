<?php

class Cliente
{
    private $id;
    private $nome;
    private $whats;
    private $foto;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $origem;
    private $aniversario;
    private $cpf;
    private $preferencias;
    private $observacoes;

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getWhats()
    {
        return $this->whats;
    }

    function setWhats($whats)
    {
        $this->whats = $whats;
    }

    function getFoto()
    {
        return $this->foto;
    }

    function setFoto($foto)
    {
        $this->foto = $foto;
    }

    function getCep()
    {
        return $this->cep;
    }

    function setCep($cep)
    {
        $this->cep = $cep;
    }

    function getEndereco()
    {
        return $this->endereco;
    }

    function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    function getNumero()
    {
        return $this->numero;
    }

    function setNumero($numero)
    {
        $this->numero = $numero;
    }

    function getBairro()
    {
        return $this->bairro;
    }

    function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    function getCidade()
    {
        return $this->cidade;
    }

    function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function getOrigem()
    {
        return $this->origem;
    }

    function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    function getCpf()
    {
        return $this->cpf;
    }

    function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    function getAniversario()
    {
        return $this->aniversario;
    }

    function setAniversario($aniversario)
    {
        $this->aniversario = $aniversario;
    }

    function setPreferencias($preferencias)
    {
        $this->preferencias = $preferencias;
    }

    function getPreferencias()
    {
        return $this->preferencias;
    }

    function getObservacoes()
    {
        return $this->observacoes;
    }

    function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
    }

    function createClient()
    {

        require '../config/conexao.php';

        $nome = $this->getNome();
        $whats = $this->getWhats();
        $foto = $this->getFoto();
        $cep = $this->getCep();
        $endereco = $this->getEndereco();
        $numero = $this->getNumero();
        $bairro = $this->getBairro();
        $cidade = $this->getCidade();
        $estado = $this->getEstado();
        $origem = $this->getOrigem();
        $aniversario = $this->getAniversario();
        $preferencias = $this->getPreferencias();
        $observacoes = $this->getObservacoes();

        $cadastro = "INSERT INTO tbl_clientes (nome, whats, foto, cep, endereco, numero, bairro, cidade, estado, origem, aniversario, cpf, preferencias, observacoes) 
        VALUES (:nome, :whats, :foto, :cep, :endereco, :numero, :bairro, :cidade, :estado, :origem, :aniversario, :cpf, :preferencias, :observacoes)";

        try {

            $result = $conect->prepare($cadastro);
            $result->bindParam(':nome', $nome, PDO::PARAM_STR);
            $result->bindParam(':whats', $whats, PDO::PARAM_STR);
            $result->bindParam(':foto', $foto, PDO::PARAM_STR);
            $result->bindParam(':cep', $cep, PDO::PARAM_STR);
            $result->bindParam(':endereco', $endereco, PDO::PARAM_STR);
            $result->bindParam(':numero', $numero, PDO::PARAM_STR);
            $result->bindParam(':bairro', $bairro, PDO::PARAM_STR);
            $result->bindParam(':cidade', $cidade, PDO::PARAM_STR);
            $result->bindParam(':estado', $estado, PDO::PARAM_STR);
            $result->bindParam(':origem', $origem, PDO::PARAM_STR);
            $result->bindParam(':aniversario', $aniversario, PDO::PARAM_STR);
            $result->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $result->bindParam(':preferencias', $preferencias, PDO::PARAM_STR);
            $result->bindParam(':observacoes', $observacoes, PDO::PARAM_STR);

            $result->execute();
            $contar = $result->rowCount();

            if ($contar > 0) {

                echo
                '<div class="container">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> OK!</h5>
                            Dados inseridos com sucesso !!!
                        </div>
                    </div>';
            } else {

                echo
                '<div class="container">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Erro!</h5>
                            Dados não inseridos !!!
                        </div>
                    </div>';
                header("Refresh: 5, home.php");
            }
        } catch (PDOException $e) {

            echo "<strong>ERRO DE PDO= </strong>" . $e->getMessage();
        }
    }

}
