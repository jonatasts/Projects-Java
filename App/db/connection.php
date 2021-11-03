<?php
//Conexão com o Banco de Dados de Monitum

$conexao = pg_pconnect("host=localhost port=5432 dbname=monitum user=postgres password=postgres") or die('Não foi possível conectar ao Banco do Monitum!');
pg_query($conexao, "set client_encoding to 'UTF8'");
