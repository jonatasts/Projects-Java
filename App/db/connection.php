<?php
//Conexão com o Banco de Dados de Monitum

$connection = pg_pconnect("host=localhost port=5432 dbname=monitum user=postgres password=postgres") or die('Não foi possível conectar ao Banco do Monitum!');
pg_query($connection, "set client_encoding to 'UTF8'");
