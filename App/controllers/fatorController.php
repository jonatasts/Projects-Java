<?php

class FatorController
{
    private static $instance;
    private $connection;

    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insertFatores($Fatores)
    {
    }

    public function selectAllFatores()
    {
        try {
            $query = "SELECT * FROM fator;";
            $fatores = [];

            $result = pg_query($this->connection, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    $fator = new Fator();

                    $fator->setId($row['id']);
                    $fator->setDescricao($row['descricao']);
                    $fator->setPeso($row['peso']);

                    $fatores[] = $fator;
                }

                return $fatores;
            }

            return null;

            pg_query($this->connection, $query);
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
            self::$instance = new FatorController($connection);
        }

        return self::$instance;
    }
}
