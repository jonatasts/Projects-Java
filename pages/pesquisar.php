<?php
session_start();

require_once "../App/db/connection.php";
include_once "../App/models/aluno.php";
include_once "../App/models/alunoFator.php";
include_once "../App/models/fator.php";
include_once "../App/controllers/alunoController.php";
include_once "../App/controllers/alunoFatorController.php";
include_once "../App/controllers/fatorController.php";

?>

<!DOCTYPE HTML>

<html>

<head>
    <title>Pesquisar Aluno</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/skel-noscript.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/style-desktop.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../assets/js/skel.min.js"></script>
    <script src="../assets/js/skel-panels.min.js"></script>
    <script src="../assets/js/init.js"></script>
    <script src="../assets/js/index.js"></script>
</head>

<body>

    <!-- Header -->
    <div id="header">
        <div id="nav-wrapper">
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="index.html">Início</a></li>
                    <li><a href="novo-aluno.html">Adicionar Aluno</a></li>
                    <li><a href="pesquisar.html">Pesquisar Aluno</a></li>
                    <li class="active"><a href="ranking.php">Ranking</a></li>
                </ul>
            </nav>
        </div>
        <div class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="#">Monitum</a></h1>
                <a href="#main"><span class="fa fa-chevron-down"></span></a>
            </div>
        </div>
    </div>
    <!-- Header -->

    <!-- Main -->
    <div id="main" class="quest">
        <div id="content" class="container">
            <section class="questionario">
                <header>
                    <?php
                    $matricula = $_GET['matricula'];
                    $alunoController = AlunoController::getInstance($connection);
                    $alunoFatorController = AlunoFatorController::getInstance($connection);
                    $fatorController = FatorController::getInstance($connection);

                    $aluno = $alunoController->selectAlunoByMatricula($matricula);

                    $alunoFatores = $alunoFatorController->selectAlunoByMatricula($matricula);

                    $fatores = $fatorController->selectAllFatores();

                    $_SESSION['matricula'] = $aluno->getMatriculaAluno();
                    $_SESSION['ano_letivo'] = $aluno->getAnoLetivo();

                    // ------ $pontuacaoAluno = (new RankingDAO()).selectPontuacaoByMatricula(matricula);
                    $pontuacaoAluno = '???';

                    if (!$aluno) {
                        echo "<h2>Aluno não econtrado! </h2>";
                    } else {
                        echo "<h2>Aluno: {$aluno->getMatriculaAluno()} </h2>";
                    }
                    ?>
                </header>
                <?php
                if (!$aluno) {
                ?>
                    <form action="pesquisar.php" onsubmit="return validaPesquisa();" method="POST">
                        <p style="font-size: 16px;">Informe a matrícula do aluno !</p>
                        <div style="margin-top: -50px;">
                            <input type="text" name="matricula" placeholder="Matrícula" />
                            <input type="submit" name="pesquisar" value="Pesquisar">
                        </div>
                        <h1 style="font-size: 16px; color:red; margin-top: 10px;">Não há aluno cadastrado com essa matrícula!</h1>

                    </form>

                <?php
                } else {
                    echo "<form action=\"editar_aluno.php\" method=\"POST\">";
                    echo "<div><p>Pontuação: $pontuacaoAluno</p></div>";
                    echo "<p>Ano Letivo: {$aluno->getAnoLetivo()}</p>";
                    echo "<p>Série Em Curso:</p>";

                    switch ($aluno->getSerieEmCurso()) {
                        case 1:
                            echo "<input type=\"radio\" value=\"1\" name=\"serie_em_curso\" id=\"primeiro_ano\" checked=\"checked\"/>";
                            echo "<label for=\"primeiro_ano\">1°</label>";
                            echo "<input type=\"radio\" value=\"2\" name=\"serie_em_curso\" id=\"segundo_ano\" />";
                            echo "<label for=\"segundo_ano\">2°</label>";
                            echo "<input type=\"radio\" value=\"3\" name=\"serie_em_curso\" id=\"terceiro_ano\" />";
                            echo "<label for=\"terceiro_ano\">3°</label>";
                            echo "<input type=\"radio\" value=\"4\" name=\"serie_em_curso\" id=\"quarto_ano\" />";
                            echo "<label for=\"quarto_ano\">4°</label>";
                            break;
                        case 2:
                            echo "<input type=\"radio\" value=\"1\" name=\"serie_em_curso\" id=\"primeiro_ano\" />";
                            echo "<label for=\"primeiro_ano\">1°</label>";
                            echo "<input type=\"radio\" value=\"2\" name=\"serie_em_curso\" id=\"segundo_ano\" checked=\"checked\" />";
                            echo "<label for=\"segundo_ano\">2°</label>";
                            echo "<input type=\"radio\" value=\"3\" name=\"serie_em_curso\" id=\"terceiro_ano\" />";
                            echo "<label for=\"terceiro_ano\">3°</label>";
                            echo "<input type=\"radio\" value=\"4\" name=\"serie_em_curso\" id=\"quarto_ano\" />";
                            echo "<label for=\"quarto_ano\">4°</label>";
                            break;
                        case 3:
                            echo "<input type=\"radio\" value=\"1\" name=\"serie_em_curso\" id=\"primeiro_ano\" />";
                            echo "<label for=\"primeiro_ano\">1°</label>";
                            echo "<input type=\"radio\" value=\"2\" name=\"serie_em_curso\" id=\"segundo_ano\" />";
                            echo "<label for=\"segundo_ano\">2°</label>";
                            echo "<input type=\"radio\" value=\"3\" name=\"serie_em_curso\" id=\"terceiro_ano\" checked=\"checked\"/>";
                            echo "<label for=\"terceiro_ano\">3°</label>";
                            echo "<input type=\"radio\" value=\"4\" name=\"serie_em_curso\" id=\"quarto_ano\" />";
                            echo "<label for=\"quarto_ano\">4°</label>";
                            break;
                        case 4:
                            echo "<input type=\"radio\" value=\"1\" name=\"serie_em_curso\" id=\"primeiro_ano\" />";
                            echo "<label for=\"primeiro_ano\">1°</label>";
                            echo "<input type=\"radio\" value=\"2\" name=\"serie_em_curso\" id=\"segundo_ano\" />";
                            echo "<label for=\"segundo_ano\">2°</label>";
                            echo "<input type=\"radio\" value=\"3\" name=\"serie_em_curso\" id=\"terceiro_ano\" />";
                            echo "<label for=\"terceiro_ano\">3°</label>";
                            echo "<input type=\"radio\" value=\"4\" name=\"serie_em_curso\" id=\"quarto_ano\" checked=\"checked\"/>";
                            echo "<label for=\"quarto_ano\">4°</label>";
                            break;
                    }

                    for ($i = 0; $i < count($alunoFatores); $i++) {
                        echo "<p>" . ($i + 1) . " - " . $fatores[$i]->getDescricao() . "?</p>";
                        switch ($alunoFatores[$i]->getResposta()) {
                            case 1: {
                                    echo "<input type=\"radio\" value=\"1\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_s\" checked=\"checked\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_s\" >Sim</label>";
                                    echo "<input type=\"radio\" value=\"0\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_n\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_n\">Não</label>";
                                    echo "<input type=\"radio\" value=\"-1\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_d\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_d\">Dúvida</label>";
                                    break;
                                }

                            case 0: {
                                    echo "<input type=\"radio\" value=\"1\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_s\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_s\">Sim</label>";
                                    echo "<input type=\"radio\" value=\"0\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_n\" checked=\"checked\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_n\">Não</label>";
                                    echo "<input type=\"radio\" value=\"-1\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_d\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_d\">Dúvida</label>";
                                    break;
                                }

                            default: {
                                    echo "<input type=\"radio\" value=\"1\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_s\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_s\">Sim</label>";
                                    echo "<input type=\"radio\" value=\"0\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_n\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_n\">Não</label>";
                                    echo "<input type=\"radio\" value=\"-1\" name=\"fator" . ($i + 1) . "\" id=\"fator" . ($i + 1) . "_d\" checked=\"checked\" />";
                                    echo "<label for=\"fator" . ($i + 1) . "_d\">Dúvida</label>";
                                    break;
                                }
                        }
                    }

                    echo "<br><br>";
                    echo "<label class=\"obs\" for=\"obs\">Observações:</label>";
                    echo "<textarea id=\"obs\" name=\"observacao\" rows=\"5\" cols=\"33\">{$aluno->getObservacao()}</textarea>";
                    echo "<br><br>";
                    echo "<input type=\"submit\" name=\"btn\" value=\"Alterar\" />";
                    echo "<input type=\"submit\" name=\"btn\" value=\"Excluir\" />";
                }

                ?>
                </form>
            </section>
        </div>
    </div>
    <!-- /Main -->

    <!-- Tweet -->
    <div id="tweet">
        <div class="container">
            <section>
                <blockquote>&ldquo;A educação é um processo social, é desenvolvimento. Não é a preparação para a vida, é a própria vida.&rdquo; - John Dewey</blockquote>
            </section>
        </div>
    </div>
    <!-- /Tweet -->

    <!-- Footer -->
    <div id="footer">
        <div class="container">
            <section>
                <header>
                    <h2>Contate-nos</h2>
                    <span class="byline">Em caso de dúvidas, críticas ou elogios, envie uma mensagem em um dos seguintes links</span>
                </header>
                <ul class="contact">
                    <li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
                    <li class="active"><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
                    <li><a href="#" class="fa fa-instagram"><span>Instagram</span></a></li>
                    <li><a href="#" class="fa fa-envelope"><span>Gmail</span></a></li>
                </ul>
            </section>
        </div>
    </div>
    <!-- /Footer -->

    <!-- Copyright -->
    <div id="copyright">
        <div class="container">
            Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
        </div>
    </div>
</body>

</html>