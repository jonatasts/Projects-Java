<!-- <%@page import="model.AlunoFator"%>
<%@page import="dao.AlunoFatorDAO"%>
<%@page import="controllers.RankingController"%>
<%@page import="dao.RankingDAO"%> -->
<!DOCTYPE HTML>
<html>

<head>
    <title>Pesquisar Aluno</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="./assets/css/skel-noscript.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/style-desktop.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./assets/js/skel.min.js"></script>
    <script src="./assets/js/skel-panels.min.js"></script>
    <script src="./assets/js/init.js"></script>
    <script src="./assets/js/index.js"></script>
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

                    <!-- 
                        //Atualiza as informa��es do aluno alteradas pelo usu�rio
                            AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
                            AlunoFator alunoFator = new AlunoFator();
                            HttpSession sessao = request.getSession();
                            alunoFator.setMatriculaAluno((String)sessao.getAttribute("matricula"));
                            String anoEmCurso = (String)sessao.getAttribute("ano_em_curso");
                            int anoCurso = Integer.parseInt(anoEmCurso);
                            alunoFator.setAnoEmCurso(anoCurso);
                            
                            if (request.getParameter("btn").equalsIgnoreCase("alterar")) {
                                try {
                                    int[] pontos = new int[30];

                                    for (int i = 0; i < 30; i++) {
                                        pontos[i] = Integer.parseInt(request.getParameter("fator" + (i + 1)));
                                    }
                                    
                                    alunoFator.setAnoLetivo(Integer.parseInt(request.getParameter("ano_letivo")));
                                    alunoFator.setObservacao(request.getParameter("observacao"));
                                    alunoFator.setFatores(pontos);
                                    alunoFatorDAO.update(alunoFator);
                                    
                                    out.println("<h2 style=\"font-size: 1.5em;\">As informa��es do aluno: <b>"+alunoFator.getMatriculaAluno()+"</b> foram atualizadas com sucesso!</h2>");

                                } catch (RuntimeException erro) {
                                    throw new RuntimeException("Erro update aluno e fatores: " + erro);
                                }
                            } //Remove o aluno escolhido pelo usu�rio
                            else if (request.getParameter("btn").equalsIgnoreCase("excluir")) {
                                String mat_aluno = alunoFator.getMatriculaAluno();
                                alunoFatorDAO.delete(mat_aluno);
                                out.println("<h2 style=\"font-size: 1.5em;\">O aluno <b>"+mat_aluno+"</b> foi removido com sucesso !</h2>");
                            } 
                    -->
                </header>

            </section>
        </div>
    </div>
    <!-- /Main -->

    <!-- Tweet -->
    <div id="tweet">
        <div class="container">
            <section>
                <blockquote>
                    &ldquo;A educação é um processo social, é desenvolvimento. Não é a
                    preparação para a vida, é a própria vida.&rdquo; - John Dewey
                </blockquote>
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
                    <span class="byline">Em caso de dúvidas, críticas ou elogios, envie uma mensagem em um
                        dos seguintes links</span>
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