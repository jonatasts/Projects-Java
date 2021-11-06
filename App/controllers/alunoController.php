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

    public function selectAllAlunos()
    {
        try {

            $query = "SELECT * FROM aluno;";

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function selectAlunoByMatricula($matricula)
    {
        try {
            $aluno = new Aluno();
            $query = "SELECT * FROM aluno WHERE matricula = '$matricula';";

            $result = pg_query($this->connection, $query);

            if ($result) {
                $row = pg_fetch_assoc($result);

                $aluno->setMatriculaAluno($row['matricula']);
                $aluno->setSerieEmCurso($row['serie_em_curso']);
                $aluno->setAnoLetivo($row['ano_letivo']);
                $aluno->setObservacao($row['observacao']);

                return $aluno;
            }

            return null;
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
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
