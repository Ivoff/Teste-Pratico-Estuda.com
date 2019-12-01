<?php

namespace App\Models;

use Database\Connection;
use Exception;
use PDO;

class Aluno implements IModel{

    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $datNasc;
    private $genero;

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
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDatNasc()
    {
        return $this->datNasc;
    }

    /**
     * @param mixed $datNasc
     */
    public function setDatNasc($datNasc)
    {
        $this->datNasc = $datNasc;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function save()
    {
        if($this->getId() > 0)
        {
            $sql = "UPDATE alunos SET nome=:nome, telefone=:telefone, 
            email=:email, data_nascimento=:data_nascimento, genero=:genero 
            WHERE id=:id";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':nome' => $this->nome,
                    ':telefone' => $this->telefone,
                    ':email' => $this->email,
                    ':data_nascimento' => $this->datNasc,
                    ':genero' => $this->genero,
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
            $sql = "INSERT INTO alunos(nome, telefone, email, data_nascimento, 
            genero) VALUES(:nome, :telefone, :email, :data_nascimento, :genero)";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':nome' => $this->nome,
                    ':telefone' => $this->telefone,
                    ':email' => $this->email,
                    ':data_nascimento' => $this->datNasc,
                    ':genero' => $this->genero
                ]);

                return;
            }catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
    }

    public function read($id)
    {
        $sql = "SELECT * FROM alunos WHERE id = $id LIMIT 1";

        $con = Connection::con();

        try{

            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            $this->setId($result['id']);
            $this->setNome($result['nome']);
            $this->setDatNasc($result['data_nascimento']);
            $this->setTelefone($result['telefone']);
            $this->setEmail($result['email']);
            $this->setGenero($result['genero']);

            return;
        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM alunos WHERE alunos.id = $this->id";

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

    public static function all()
    {
        $sql = "SELECT * FROM alunos";

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
        $sql = "SELECT * FROM alunos WHERE MATCH(nome) AGAINST('".$query."' IN BOOLEAN MODE)";

        $con = Connection::con();

        try
        {

            $stamement = $con->prepare($sql);
            $stamement ->execute();

            return $stamement->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}
