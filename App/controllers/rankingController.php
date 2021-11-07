<?php

class RankingController
{
    private static $instance;
    private $connection;

    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insertRanking($ranking)
    {
        try {
            $query = "INSERT INTO ranking (id_aluno, ano_letivo, pontuacao, observacao) 
                      VALUES ('{$ranking->getIdAluno()}', {$ranking->getAnoLetivo()}, 
                      {$ranking->getPontuacao()}, {$ranking->getObservacao()});";

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function selectRankings()
    {
        try {
            $rankings = [];
            $query = "SELECT * FROM ranking ORDER BY pontuacao DESC;";

            $result = pg_query($this->connection, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    $ranking = new Ranking();

                    $ranking->setIdAluno($row['id_aluno']);
                    $ranking->setAnoLetivo($row['ano_letivo']);
                    $ranking->setPontuacao($row['pontuacao']);
                    $ranking->setObservacao($row['observacao']);

                    $rankings[] = $ranking;
                }

                return $rankings;
            }

            return null;
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function selectPontuacaoByMatricula($id_aluno_fator)
    {
        try {
            $query = "SELECT pontuacao FROM ranking WHERE id_aluno_fator = '$id_aluno_fator';";

            $result = pg_query($this->connection, $query);

            if ($result) {
                $row = pg_fetch_assoc($result);

                return $row['pontuacao'];
            }

            return 0;
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function update($ranking)
    {
        try {
            $query = "UPDATE ranking SET ano_letivo = {$ranking->getAnoLetivo()}, 
                      pontuacao = {$ranking->getPontuacao()}, observacao = {$ranking->getObservacao()} 
                      WHERE id_aluno = '{$ranking->getIdAluno()}';";

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function delete($id_aluno_fator)
    {
        try {
            $query = "DELETE FROM ranking WHERE id_aluno_fator = '$id_aluno_fator';";

            pg_query($this->connection, $query);
        } catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function calcularPontuacao($alunoFatores, $fatorController)
    {
        $resultado = 0;
        $fatores = $fatorController->selectAllFatores();

        for ($i = 0; $i < count($alunoFatores); $i++) {
            if ($alunoFatores[$i]->getResposta() > 0) {
                $resultado += $fatores[$i]->getPeso();
            }
        }

        return $resultado;
    }


    public static function getInstance($connection)
    {
        if (!isset(self::$instance)) {
            self::$instance = new RankingController($connection);
        }

        return self::$instance;
    }
}
