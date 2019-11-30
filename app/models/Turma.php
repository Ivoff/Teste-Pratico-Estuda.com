<?php

namespace App\Models;

use Database\Connection;
use Exception;

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
        if($this->getId() > 0)
        {
            $sql = "UPDATE turmas SET escola_id=2, ano=:ano, 
            nivel_ensino=:nivel_ensino, serie=:serie, turno=:turno  
            WHERE id=:id";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    'ano' => $this->ano,
                    'nivel_ensino' => $this->nivelEnsino,
                    'serie' => $this->serie,
                    'turno' => $this->turno,
                    'id' => $this->id
                ]);

                return;
            }catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        else
        {
            $sql = "INSERT INTO turmas(escola, ano, nivel_ensino, serie, 
            turno) VALUES(2, :ano, :nivel, :serie, :turno)";

            $con = Connection::con();

            try
            {
                $statement = $con->prepare($sql);

                $statement->execute([
                    'ano' => $this->ano,
                    'nivel_ensino' => $this->nivelEnsino,
                    'serie' => $this->serie,
                    'turno' => $this->turno
                ]);

                return;
            }catch (Exception $e)
            {
                die($e->getMessage());
            }
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
        // TODO: Implement save() method.
    }

    public static function all()
    {
        $sql = "SELECT * FROM turmas";

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
        // TODO: Implement search() method.
    }
}
