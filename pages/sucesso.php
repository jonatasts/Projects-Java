<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Cadastrar Aluno</title>
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
					if (isset($_SESSION['deletedStudent'])) {
						echo "<h2 style=\"font-size: 2em;\">O aluno <b>{$_SESSION['matricula']}</b> foi removido com sucesso !</h2>";;
						unset($_SESSION['deletedStudent']);
					} else if (isset($_SESSION['pontuacao'])) {
						echo "<h2>Aluno adicionado com sucesso !</h2>";
					}
					?>
				</header>
				<form>
					<?php
					if (isset($_SESSION['pontuacao'])) {
						echo "<h2>A pontuação atual é: <span>{$_SESSION['pontuacao']}</span></h2>";
						unset($_SESSION['pontuacao']);
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