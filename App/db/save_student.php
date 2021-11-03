<?php
// require_once "connection.php";
include_once "../models/Aluno.php";
include_once "../models/alunoFator.php";


$matriculaAluno = pg_escape_string(trim(!empty($_POST['matricula']) ? $_POST['matricula'] : null));
$serieEmCurso = pg_escape_string(trim(!empty($_POST['serie_em_curso']) ? $_POST['serie_em_curso'] : null));
$anoLetivo = pg_escape_string(trim(!empty($_POST['ano_letivo']) ? $_POST['ano_letivo'] : null));
$observacao = pg_escape_string(trim(!empty($_POST['observacao']) ? $_POST['observacao'] : null));


echo $matriculaAluno, $serieEmCurso,  $anoLetivo,  $observacao;
