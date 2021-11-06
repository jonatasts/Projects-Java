<?php

class AlunoFatorController
{
    private static $instance;
    private $connection;

    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insertAlunoFatores($alunoFatores)
    {
        $query = "INSERT INTO aluno_fator (aluno_id, fator_id, resposta) VALUES ";

        try {
            foreach ($alunoFatores
                as $key => $alunoFator) {
                $query .= "('{$alunoFator->getMatriculaAluno()}', '{$alunoFator->getFatorId()}', {$alunoFator->getResposta()})";
                $query .= $key + 1 === count($alunoFatores) ? ';' : ', ';
            }

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function select($alunoFatores)
    {
    }

    public function selectAlunoByMatricula($matricula)
    {
        try {
            $query = "SELECT * FROM aluno_fator WHERE aluno_id = '$matricula';";
            $alunoFatores = [];

            $result = pg_query($this->connection, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    $alunoFator = new AlunoFator();

                    $alunoFator->setMatriculaAluno($row['aluno_id']);
                    $alunoFator->setFatorId($row['fator_id']);
                    $alunoFator->setResposta($row['resposta']);

                    $alunoFatores[] = $alunoFator;
                }

                return $alunoFatores;
            }

            return null;
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function update($alunoFatores)
    {
        $query = '';

        try {
            foreach ($alunoFatores as $alunoFator) {
                $query .= "UPDATE aluno_fator SET resposta = {$alunoFator->getResposta()} 
                          WHERE aluno_id= '{$alunoFator->getMatriculaAluno()}' 
                          AND fator_id= '{$alunoFator->getFatorId()}';";
            }

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function delete($alunoId)
    {
        try {
            $query = "DELETE FROM aluno_fator WHERE aluno_id = '$alunoId';";

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }


    public static function getInstance($connection)
    {
        if (!isset(self::$instance)) {
            self::$instance = new AlunoFatorController($connection);
        }

        return self::$instance;
    }
}
