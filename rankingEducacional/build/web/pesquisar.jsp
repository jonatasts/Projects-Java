<%-- 
    Document   : pesquisar
    Created on : 20/09/2019, 17:56:12
    Author     : Jhon
--%>

<%@page import="model.Fator"%>
<%@page import="java.util.ArrayList"%>
<%@page import="dao.FatorDAO"%>
<%@page import="dao.RankingDAO"%>
<%@page import="model.AlunoFator"%>
<%@page import="dao.AlunoFatorDAO"%>
<%@page import="controllers.AlunoFatorController"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML>

<html>
    <head>
        <title>Pesquisar Aluno</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-panels.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/index.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
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
                        <li class="active"><a href="ranking.jsp">Ranking</a></li>
                    </ul>
                </nav>
            </div>
            <div class="container"> 

                <!-- Logo -->
                <div id="logo">
                    <h1><a href="#">Sistema X</a></h1>
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
                        <%                            
                            String matricula = request.getParameter("matricula");
                            HttpSession sessao = request.getSession();
                            
                            session.setAttribute("matricula",matricula);
                            
                            int pontuacaoAluno = (new RankingDAO()).selectPontuacaoByMatricula(matricula);
                            FatorDAO fatorDAO = new FatorDAO();
                            ArrayList<Fator> fatores = fatorDAO.select();
                            AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
                            AlunoFator alunoFator = new AlunoFator();

                            alunoFator = alunoFatorDAO.selectAlunoFatorByMatricula(matricula);
                            String matriculaAlunoBanco = alunoFator.getMatriculaAluno();
                            String anoEmCurso = Integer.toString(alunoFator.getAnoEmCurso());
                            
                            session.setAttribute("ano_em_curso",anoEmCurso);
                            
                            if (matriculaAlunoBanco == null) {
                                out.println("<h2>Aluno não econtrado ! </h2>");
                            } else {
                                out.println("<h2>Aluno: " + alunoFator.getMatriculaAluno() + " </h2>");
                            }
                        %>
                    </header>
                        <%
                            if (matriculaAlunoBanco == null) {// Exibe o campo de pesquisa novamente ou um link para atualizar a página
                            %>
                                <form action="pesquisar.jsp" onsubmit="return validaPesquisa();" method="POST">
                                    <p style="font-size: 16px;">Informe a matrícula do aluno !</p>
                                    <div style="margin-top: -50px;">
                                        <input type="text" name="matricula" placeholder="Matrícula" />
                                        <input type="submit" name="pesquisar" value="Pesquisar" >	
                                    </div>
                                </form>
                        <form action="editar_aluno.jsp" method="POST">
                            <%    
                            } //Exibe as informações do aluno obtidas do banco
                            else {
                                out.println("<div><p>Pontuação: " + pontuacaoAluno + "</p></div>");
                                out.println("<p>Ano Em Curso: " + alunoFator.getAnoEmCurso() + "</p>");
                                out.println("<p>Ano Letivo:</p>");

                                switch (alunoFator.getAnoLetivo()) {
                                    case 1:
                                        out.println("<input type=\"radio\" value=\"1\" name=\"ano_letivo\" id=\"primeiro_ano\" checked=\"checked\"/>");
                                        out.println("<label for=\"primeiro_ano\">1°</label>");
                                        out.println("<input type=\"radio\" value=\"2\" name=\"ano_letivo\" id=\"segundo_ano\" />");
                                        out.println("<label for=\"segundo_ano\">2°</label>");
                                        out.println("<input type=\"radio\" value=\"3\" name=\"ano_letivo\" id=\"terceiro_ano\" />");
                                        out.println("<label for=\"terceiro_ano\">3°</label>");
                                        out.println("<input type=\"radio\" value=\"4\" name=\"ano_letivo\" id=\"quarto_ano\" />");
                                        out.println("<label for=\"quarto_ano\">4°</label>");
                                        break;
                                    case 2:
                                        out.println("<input type=\"radio\" value=\"1\" name=\"ano_letivo\" id=\"primeiro_ano\" />");
                                        out.println("<label for=\"primeiro_ano\">1°</label>");
                                        out.println("<input type=\"radio\" value=\"2\" name=\"ano_letivo\" id=\"segundo_ano\" checked=\"checked\" />");
                                        out.println("<label for=\"segundo_ano\">2°</label>");
                                        out.println("<input type=\"radio\" value=\"3\" name=\"ano_letivo\" id=\"terceiro_ano\" />");
                                        out.println("<label for=\"terceiro_ano\">3°</label>");
                                        out.println("<input type=\"radio\" value=\"4\" name=\"ano_letivo\" id=\"quarto_ano\" />");
                                        out.println("<label for=\"quarto_ano\">4°</label>");
                                        break;
                                    case 3:
                                        out.println("<input type=\"radio\" value=\"1\" name=\"ano_letivo\" id=\"primeiro_ano\" />");
                                        out.println("<label for=\"primeiro_ano\">1°</label>");
                                        out.println("<input type=\"radio\" value=\"2\" name=\"ano_letivo\" id=\"segundo_ano\" />");
                                        out.println("<label for=\"segundo_ano\">2°</label>");
                                        out.println("<input type=\"radio\" value=\"3\" name=\"ano_letivo\" id=\"terceiro_ano\" checked=\"checked\"/>");
                                        out.println("<label for=\"terceiro_ano\">3°</label>");
                                        out.println("<input type=\"radio\" value=\"4\" name=\"ano_letivo\" id=\"quarto_ano\" />");
                                        out.println("<label for=\"quarto_ano\">4°</label>");
                                        break;
                                    case 4:
                                        out.println("<input type=\"radio\" value=\"1\" name=\"ano_letivo\" id=\"primeiro_ano\" />");
                                        out.println("<label for=\"primeiro_ano\">1°</label>");
                                        out.println("<input type=\"radio\" value=\"2\" name=\"ano_letivo\" id=\"segundo_ano\" />");
                                        out.println("<label for=\"segundo_ano\">2°</label>");
                                        out.println("<input type=\"radio\" value=\"3\" name=\"ano_letivo\" id=\"terceiro_ano\" />");
                                        out.println("<label for=\"terceiro_ano\">3°</label>");
                                        out.println("<input type=\"radio\" value=\"4\" name=\"ano_letivo\" id=\"quarto_ano\" checked=\"checked\"/>");
                                        out.println("<label for=\"quarto_ano\">4°</label>");
                                        break;
                                }

                                for (int i = 0; i < alunoFator.getFatores().length; i++) {
                                    out.println("<p>" + (i + 1) + " - " + fatores.get(i).getDescricao() + "?</p>");
                                    switch (alunoFator.getFatores(i)) {
                                        case 1: {
                                            out.println("<input type=\"radio\" value=\"1\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_s\" checked=\"checked\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_s\" >Sim</label>");
                                            out.println("<input type=\"radio\" value=\"0\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_n\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_n\">Não</label>");
                                            out.println("<input type=\"radio\" value=\"-1\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_d\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_d\">Dúvida</label>");
                                            break;
                                        }

                                        case 0: {
                                            out.println("<input type=\"radio\" value=\"1\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_s\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_s\">Sim</label>");
                                            out.println("<input type=\"radio\" value=\"0\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_n\" checked=\"checked\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_n\">Não</label>");
                                            out.println("<input type=\"radio\" value=\"-1\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_d\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_d\">Dúvida</label>");
                                            break;
                                        }

                                        default: {
                                            out.println("<input type=\"radio\" value=\"1\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_s\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_s\">Sim</label>");
                                            out.println("<input type=\"radio\" value=\"0\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_n\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_n\">Não</label>");
                                            out.println("<input type=\"radio\" value=\"-1\" name=\"fator" + (i + 1) + "\" id=\"fator" + (i + 1) + "_d\" checked=\"checked\" />");
                                            out.println("<label for=\"fator" + (i + 1) + "_d\">Dúvida</label>");
                                            break;
                                        }
                                    }

                                }
                                out.println("<label class=\"obs\" for=\"obs\">Observações:</label>");
                                out.println("<textarea id=\"obs\" name=\"observacao\" rows=\"5\" cols=\"33\">"+alunoFator.getObservacao()+"</textarea>");
                                out.println("<br><br>");
                                out.println("<input type=\"submit\" name=\"btn\" value=\"Alterar\" />");
                                out.println("<input type=\"submit\" name=\"btn\" value=\"Excluir\" />");
                            }
                        %>
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
