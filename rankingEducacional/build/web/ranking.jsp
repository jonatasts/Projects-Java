<%@page import="java.util.List"%>
<%@page import="model.Ranking"%>
<%@page import="java.util.ArrayList"%>
<%@page import="dao.RankingDAO"%>
<%@page import="controllers.RankingController"%>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Ranking</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="js/datatables.min.js"></script>
                <script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
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
						<li><a href="index.html">In�cio</a></li>
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
				<section class="ranking">
					<header>
						<h2>Ranking</h2>
					</header>
					<table>

					  <p>Exibir:</p>

					  <select>
				  		<option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="all">Tudo</option>
					  </select>

					  <button>Exportar</button>

					  <thead>
					    <tr>
					      <th scope="col">Classifica��o</th>
					      <th scope="col">Matr�cula</th>
                                              <th scope="col">Ano em Curso</th>
					      <th scope="col">Pontua��o</th>
					      <th scope="col">Observa��o</th>
					    </tr>
					  </thead>
					  <tbody>
                                              
                                           <%
                                                RankingController rankingController = new RankingController();
                                                RankingDAO rankingDAO = new RankingDAO();
                                                List<Ranking> rankings = new ArrayList();
                                               
                                                rankingController.gerarRanking();
                                                rankings = rankingController.verificaObservacao(rankingDAO.select());
                                                String matricula;
                                                int anoEmCurso;
                                                int pontuacao;
                                                Boolean observacao;
                                                int contador=1;
                                                
                                                for(int i = 0; i < rankings.size(); i++){
                                                    matricula = rankings.get(i).getIdAluno();
                                                    anoEmCurso = rankings.get(i).getAnoEmCurso();
                                                    pontuacao = rankings.get(i).getPontuacao();
                                                    observacao = rankings.get(i).getObservacao();
                                                    
                                                    out.println("<tr>");
                                                    out.println("<td data-label=\"Classifica��o\">"+ contador +"</td>");
                                                    out.println("<td data-label=\"Matr�cula\">"+ matricula +"</td>");
                                                    out.println("<td data-label=\"Ano em Curso\">"+ anoEmCurso +"</td>");
                                                    out.println("<td data-label=\"Pontua��o\">"+ pontuacao +"</td>");
                                                    if(observacao){
                                                        out.println("<td data-label=\"Observa��o\">SIM</td>");
                                                    }
                                                    else {
                                                        out.println("<td data-label=\"Observa��o\">N�O</td>");
                                                    }
                                                    out.println("</tr>");
                                                    contador++;
                                                }
                                           %>
                                           
                                           
					  </tbody>
					</table>

					<!--<button>Exportar</button>-->

				</section>
			</div>
		</div>
	<!-- /Main -->

	<!-- Tweet -->
		<div id="tweet">
			<div class="container">
				<section>
					<blockquote>&ldquo;A educa��o � um processo social, � desenvolvimento. N�o � a prepara��o para a vida, � a pr�pria vida.&rdquo; - John Dewey</blockquote>
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
						<span class="byline">Em caso de d�vidas, cr�ticas ou elogios, envie uma mensagem em um dos seguintes links</span>
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