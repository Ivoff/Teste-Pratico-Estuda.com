<?php

namespace App\Models;

use App\Controllers\AlunoTurmaController;
use Database\Connection;
use Exception;
use PDO;

class AlunoTurma implements IModel
{

    private $id;
    private $aluno;
    private $turma;

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
    public function getAluno()
    {
        return $this->aluno;
    }

    /**
     * @param mixed $aluno
     */
    public function setAluno($aluno)
    {
        $this->aluno = $aluno;
    }

    /**
     * @return mixed
     */
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * @param mixed $turma
     */
    public function setTurma($turma)
    {
        $this->turma = $turma;
    }

    public function save()
    {
        if($this->getId() > 0)
        {
            $sql = "UPDATE aluno_turma SET aluno_id=:aluno_id, turma=:turma_id,            
            WHERE id=:id";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':aluno_id' => $this->aluno->getId(),
                    ':turma_id' => $this->turma->getId(),
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
            $sql = "INSERT INTO aluno_turma( aluno_id, turma_id ) 
            VALUES(:aluno_id, :turma_id)";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':aluno_id' => $this->aluno->getId(),
                    ':turma_id' => $this->turma->getId()
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
        $sql = "SELECT * FROM aluno_turma WHERE id = $id LIMIT 1";

        $con = Connection::con();

        try{

            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            $this->id = $result['id'];

            $aluno = new Aluno();
            $aluno->read($result['aluno_id']);
            $this->aluno = $aluno;

            $turma = new Turma();
            $turma->read($result['turma_id']);
            $this->turma = $turma;

            return;
        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM aluno_turma WHERE id = $this->id";

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
        $sql = "SELECT * FROM aluno_turma";

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

    public static function turmasFromAluno($id)
    {
        $sql = "SELECT * FROM aluno_turma WHERE aluno_id = $id";

        $con = Connection::con();

        try
        {
            $statement = $con->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $turmas = [];

            for($i = 0; $i < count($result); $i += 1)
            {
                $turma = new Turma();
                $turma->read($result[$i]['turma_id']);
                $turmas[$i] = ['turma' => $turma, 'id' => $result[$i]['id']];
            }

            return $turmas;

        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public static function alunosFromTurma($id)
    {
        $sql = "SELECT * FROM aluno_turma where turma_id = $id";

        $con = Connection::con();

        try
        {

            $statement = $con->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $alunos = [];

            for($i = 0; $i < count($result); $i += 1)
            {
                $aluno = new Aluno();
                $aluno->read($result[$i]['aluno_id']);
                $alunos[$i] = ['aluno' => $aluno, 'id' => $result[$i]['id']];
            }

            return $alunos;

        }catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public static function search($query)
    {
        // TODO: Implement search() method.
    }
}
