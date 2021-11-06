<?php

class AlunoFatorController
{
    private static $instance;
    private $connection;

    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insertAlunosFatores($alunosFatores)
    {
        $query = "INSERT INTO aluno_fator (aluno_id, fator_id, resposta) VALUES ";

        try {
            foreach ($alunosFatores
                as $key => $alunoFator) {
                $query .= "('{$alunoFator->getMatriculaAluno()}', '{$alunoFator->getFatorId()}', {$alunoFator->getResposta()})";
                $query .= $key + 1 === count($alunosFatores) ? ';' : ', ';
            }

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function select($alunosFatores)
    {
    }

    public function selectAlunoByMatricula($matricula)
    {
        try {
            $query = "SELECT * FROM aluno_fator WHERE aluno_id = '$matricula';";
            $alunosFatores = [];

            $result = pg_query($this->connection, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    $alunoFator = new AlunoFator();

                    $alunoFator->setMatriculaAluno($row['aluno_id']);
                    $alunoFator->setFatorId($row['fator_id']);
                    $alunoFator->setResposta($row['resposta']);

                    $alunosFatores[] = $alunoFator;
                }

                return $alunosFatores;
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

    public function delete($alunosFatores)
    {
    }


    public static function getInstance($connection)
    {
        if (!isset(self::$instance)) {
            self::$instance = new AlunoFatorController($connection);
        }

        return self::$instance;
    }
}
