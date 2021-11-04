<?php
session_start();

require_once "connection.php";
include_once "../models/Aluno.php";
include_once "../models/alunoFator.php";
include_once "../controllers/alunoController.php";
include_once "../controllers/alunoFatorController.php";

$matriculaAluno = pg_escape_string(trim(!empty($_POST['matricula']) ? $_POST['matricula'] : null));
$serieEmCurso = pg_escape_string(trim(!empty($_POST['serie_em_curso']) ? $_POST['serie_em_curso'] : null));
$anoLetivo = pg_escape_string(trim(!empty($_POST['ano_letivo']) ? $_POST['ano_letivo'] : null));
$observacao = pg_escape_string(trim(!empty($_POST['observacao']) ? $_POST['observacao'] : null));

$aluno = new Aluno();
$alunosFatores = [];
$alunoController = AlunoController::getInstance($connection);
$alunoFatorController = AlunoFatorController::getInstance($connection);

$aluno->setMatriculaAluno($matriculaAluno);
$aluno->setSerieEmCurso($serieEmCurso);
$aluno->setAnoLetivo($anoLetivo);
$aluno->setObservacao($observacao);

for ($i = 0; $i < 30; $i++) {
    $alunoFator = new AlunoFator();

    $alunoFator->setMatriculaAluno($aluno->getMatriculaAluno());
    $alunoFator->setFatorId("f" . ($i + 1));
    $alunoFator->setResposta(pg_escape_string(trim($_POST["fator" . ($i + 1)])));

    $alunosFatores[] =  $alunoFator;
}

$alunoController->insertAluno($aluno);
$alunoFatorController->insertAlunosFatores($alunosFatores);

$_SESSION['pontuacao'] = "???";

header('Location: ../../pages/sucesso.php');
