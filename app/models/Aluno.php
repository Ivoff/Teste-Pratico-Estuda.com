<?php

namespace App\Models;

use Database\Connection;
use Exception;

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
        $sql = "INSERT INTO alunos(nome, telefone, email, data_nascimento, genero) 
        VALUES(:nome, :telefone, :email, :data_nascimento, :genero)";

        try
        {
            $con = Connection::con();

            $statement = $con->prepare($sql);

            $statement->execute([
                ':nome' => $this->nome,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':data_nascimento' => $this->datNasc,
                'genero' => $this->genero
            ]);

        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
