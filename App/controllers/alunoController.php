<?php

class AlunoController
{
    private static $instance;
    private $connection;

    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insertAluno($aluno)
    {
        try {
            $query = "INSERT INTO aluno (matricula, serie_em_curso, ano_letivo, observacao) VALUES ('{$aluno->getMatriculaAluno()}', {$aluno->getSerieEmCurso()}, {$aluno->getAnoLetivo()}, '{$aluno->getObservacao()}');";

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function select($aluno)
    {
    }

    public function selectAlunoByMatricula($matricula)
    {
    }

    public function update()
    {
    }

    public function delete($aluno)
    {
    }


    public static function getInstance($connection)
    {
        if (!isset(self::$instance)) {
            self::$instance = new AlunoController($connection);
        }

        return self::$instance;
    }
}
