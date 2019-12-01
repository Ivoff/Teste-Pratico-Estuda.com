<?php

namespace App\Models;

use Database\Connection;
use Exception;
use PDO;

class Turma implements IModel {

    private $id;
    private $escola;
    private $ano;
    private $nivelEnsino;
    private $serie;
    private $turno;

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
    public function getEscola()
    {
        return $this->escola;
    }

    /**
     * @param mixed $escola
     */
    public function setEscola($escola)
    {
        $this->escola = $escola;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    /**
     * @return mixed
     */
    public function getNivelEnsino()
    {
        return $this->nivelEnsino;
    }

    /**
     * @param mixed $nivelEnsino
     */
    public function setNivelEnsino($nivelEnsino)
    {
        $this->nivelEnsino = $nivelEnsino;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * @param mixed $turno
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;
    }

    public function read($id)
    {
        $sql = "SELECT * FROM turmas WHERE id = $id LIMIT 1";

        $con = Connection::con();

        try{

            $statement = $con->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();

            $escola = new Escola();
            $escola->read($result['escola_id']);

            $this->setEscola($escola);
            $this->setAno($result['ano']);
            $this->setNivelEnsino($result['nivel_ensino']);
            $this->setSerie($result['serie']);
            $this->setTurno($result['turno']);
            $this->setId($result['id']);


            return;
        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function delete()
    {
        $sql = "DELETE FROM turmas WHERE turmas.id = $this->id";

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
            $sql = "UPDATE turmas SET escola_id=:escola_id, ano=:ano, 
            nivel_ensino=:nivel_ensino, serie=:serie, turno=:turno  
            WHERE id=:id";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':escola_id' => $this->escola->getId(),
                    ':ano' => $this->ano,
                    ':nivel_ensino' => $this->nivelEnsino,
                    ':serie' => $this->serie,
                    ':turno' => $this->turno,
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
            $sql = "INSERT INTO turmas(escola_id, ano, nivel_ensino, serie, 
            turno) VALUES(:escola_id, :ano, :nivel_ensino, :serie, :turno)";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    ':escola_id' => $this->escola->getId(),
                    ':ano' => $this->ano,
                    ':nivel_ensino' => $this->nivelEnsino,
                    ':serie' => $this->serie,
                    ':turno' => $this->turno
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
        $sql = "SELECT * FROM turmas";

        $con = Connection::con();

        try
        {

            $statement = $con->prepare($sql);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            for($i = 0; $i < count($result); $i += 1)
            {
                $escola = new Escola();
                $escola->read($result[$i]['escola_id']);
                $result[$i]['escola'] = $escola;
            }

            return $result;

        }catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public static function search($query)
    {

    }
}
