	<!-- <%@page import="java.util.List"%>
	<%@page import="model.Ranking"%>
	<%@page import="java.util.ArrayList"%>
	<%@page import="dao.RankingDAO"%>
	<%@page import="controllers.RankingController"%> -->
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Ranking</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="./assets/css/skel-noscript.css" />
		<link rel="stylesheet" href="./assets/css/style.css" />
		<link rel="stylesheet" href="./assets/css/style-desktop.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="./assets/js/skel.min.js"></script>
		<script src="./assets/js/skel-panels.min.js"></script>
		<script src="./assets/js/init.js"></script>

		<script src="./lib//DataTables/datatables.min.js"></script>
		<script src="./lib//DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/buttons.flash.min.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/jszip.min.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/pdfmake.min.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/vfs_fonts.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
		<script src="./lib//DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#myTable').DataTable({
					dom: 'lfrtipB',
					buttons: [{
							extend: 'copy',
							text: 'Copiar'
						},
						{
							extend: 'csv',
							text: 'CSV'
						},
						{
							extend: 'excel',
							text: 'EXCEL'
						},
						{
							extend: 'pdf',
							text: 'PDF'
						},
						{
							extend: 'print',
							text: 'PRINT'
						}
					],
					"language": {
						"lengthMenu": "Exibir _MENU_ ",
						"zeroRecords": " ",
						"info": "Exibindo página _PAGE_ de _PAGES_",
						"infoEmpty": "Nenhum registro encontrado",
						"infoFiltered": "(Filtrado de _MAX_ registros)",
						"search": "Pesquisar",
						"paginate": {
							"next": "Próxima",
							"previous": "Anterior"
						}
					}
				});
			});
		</script>
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
				<section class="ranking">
					<header>
						<h2>Ranking</h2>
					</header>
					<table id="myTable" class="display" style="width:100%">

						<!--<p>Exibir:</p>

						  <select>
					  		<option value="10">10</option>
	                                                <option value="20">20</option>
	                                                <option value="50">50</option>
	                                                <option value="all">Tudo</option>
						  </select>

						  <button>Exportar</button>-->

						<thead>
							<tr>
								<th scope="col">Classificacão</th>
								<th scope="col">Matrícula</th>
								<th scope="col">Série em Curso</th>
								<th scope="col">Pontuação</th>
								<th scope="col">Observação</th>
							</tr>
						</thead>
						<tbody>
							<!-- 
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
									out.println("<td data-label=\"Classificacão\">"+ contador +"</td>");
									out.println("<td data-label=\"Matrícula\"><a rel=\"noopener noreferrer\" href=\"pesquisar.jsp?matricula="+ matricula +"\">"+ matricula +"</a></td>");
									out.println("<td data-label=\"Série em Curso\">"+ anoEmCurso +"</td>");
									out.println("<td data-label=\"Pontuação\">"+ pontuacao +"</td>");
									if(observacao){
										out.println("<td data-label=\"Observação\">SIM</td>");
									}
									else {
										out.println("<td data-label=\"Observação\">NÃO</td>");
									}
									out.println("</tr>");
									contador++;
								} 
							-->
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