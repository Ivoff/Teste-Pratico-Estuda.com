<?php

namespace App\Models;

use Database\Connection;
use Exception;
use PDO;

class Escola implements IModel {

    private $id;
    private $nome;
    private $endereco;
    private $cidade;
    private $estado;
    private $situacao;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }
    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }/**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }/**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }/**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function read($id)
    {
        $sql = "SELECT * FROM escolas WHERE id = $id LIMIT 1";

        $con = Connection::con();

        try{

            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            $this->setId($result['id']);
            $this->setNome($result['nome']);
            $this->setEndereco($result['endereco']);
            $this->setCidade($result['cidade']);
            $this->setEstado($result['estado']);
            $this->setSituacao($result['situacao']);

            return;
        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM escolas WHERE id = $this->id";

        $con = Connection::con();

        try
        {
            $con->exec($sql);

            return;
        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function save()
    {
        if($this->getId() > 0)
        {
            $sql = "UPDATE escolas SET nome=:nome, endereco=:endereco, 
            cidade=:cidade, estado=:estado, situacao=:situacao 
            WHERE id=:id";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':nome' => $this->nome,
                    ':endereco' => $this->endereco,
                    ':cidade' => $this->cidade,
                    ':estado' => $this->estado,
                    ':situacao' => $this->situacao,
                    ':id' => $this->id
                ]);

                return;
            }catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        else
        {
            $sql = "INSERT INTO escolas(nome, endereco, cidade, estado, 
            situacao) VALUES(:nome, :endereco, :cidade, :estado, :situacao)";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':nome' => $this->nome,
                    ':endereco' => $this->endereco,
                    ':cidade' => $this->cidade,
                    ':estado' => $this->estado,
                    ':situacao' => $this->situacao
                ]);

                return;
            }catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
    }

    public static function all()
    {
        $sql = "SELECT * FROM escolas";

        $con = Connection::con();

        try
        {

            $statement = $con->prepare($sql);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public static function search($query)
    {
        $sql = "SELECT * FROM escolas WHERE MATCH(nome) AGAINST('".$query."' IN BOOLEAN MODE)";

        $con = Connection::con();

        try
        {

            $stamement = $con->prepare($sql);
            $stamement ->execute();

            return $stamement->fetchAll(  PDO::FETCH_ASSOC);

        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}