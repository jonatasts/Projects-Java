<?php
session_start();

require_once "connection.php";
include_once "../models/Aluno.php";
include_once "../models/alunoFator.php";
include_once "../models/fator.php";
include_once "../models/ranking.php";
include_once "../controllers/alunoController.php";
include_once "../controllers/alunoFatorController.php";
include_once "../controllers/fatorController.php";
include_once "../controllers/rankingController.php";

$matriculaAluno = pg_escape_string(trim(!empty($_POST['matricula']) ? $_POST['matricula'] : null));
$serieEmCurso = pg_escape_string(trim(!empty($_POST['serie_em_curso']) ? $_POST['serie_em_curso'] : null));
$anoLetivo = pg_escape_string(trim(!empty($_POST['ano_letivo']) ? $_POST['ano_letivo'] : null));
$observacao = pg_escape_string(trim(!empty($_POST['observacao']) ? $_POST['observacao'] : ''));

$aluno = new Aluno();
$alunoFatores = [];
$ranking = new Ranking();
$alunoController = AlunoController::getInstance($connection);
$alunoFatorController = AlunoFatorController::getInstance($connection);
$fatorController = FatorController::getInstance($connection);
$rankingController = RankingController::getInstance($connection);

$aluno->setMatriculaAluno($matriculaAluno);
$aluno->setSerieEmCurso($serieEmCurso);
$aluno->setAnoLetivo($anoLetivo);
$aluno->setObservacao($observacao);

for ($i = 0; $i < 30; $i++) {
    $alunoFator = new AlunoFator();

    $alunoFator->setMatriculaAluno($aluno->getMatriculaAluno());
    $alunoFator->setFatorId("f" . ($i + 1));
    $alunoFator->setResposta(pg_escape_string(trim($_POST["fator" . ($i + 1)])));

    $alunoFatores[] =  $alunoFator;
}

$alunoController->insertAluno($aluno);
$alunoFatorController->insertAlunoFatores($alunoFatores);

$pontuacao = $rankingController->calcularPontuacao($alunoFatores, $fatorController);
$ranking->setIdAluno($aluno->getMatriculaAluno());
$ranking->setAnoLetivo($aluno->getAnoLetivo());
$ranking->setPontuacao($pontuacao);
$ranking->setObservacao(strlen($observacao) > 0 ? 'true' : 'false');

$rankingController->insertRanking($ranking);

$_SESSION['pontuacao'] = $pontuacao;

header('Location: ../../pages/sucesso.php');
