<?php
	include_once('../conexao.php');
	session_start();
	include_once('../user.php');
	include_once('../saldo.php');
	date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<style type="text/css">
		body {
			color: #232433;
			margin: 0%;
			font-family: Poppins;
			font-weight: 500;
			background-color: #F9F9F9;
		}
		nav {
			font-family: Poppins;
			padding-left: 10%;
			padding-right: 10%;
		    margin:0px;
		    list-style:none;
		    font-weight: 600;
		    color: #444444;
		}
		a {
			text-decoration: none;
			color: #232433;
		}
		ul {
			padding-left: 0px;
		}
		ul li {
			padding: 0px;
			display: inline;
		}
		nav ul li a {
		    padding: 2px 10px;
		    display: inline-block;
		    color: #444444;
		    text-decoration: none;
		}
		nav ul li a:hover {
		    padding: 2px 10px;
		    display: inline-block;
		    color: #090A0D;
		    text-decoration: none;
		}
		.menu {
			height: 7.5vh;
			width: 100%;
		}
		.space {
			width: 100%;
		}
		.content {
			padding-left: 10%;
			width: 80%;
		}
		h1 {
			font-family: Rubik;
			margin: 0%;
			font-size: 3em;
		}
		h2 {
			font-family: Rubik;
		}
		h4 {
			font-family: Poppins;
			margin: 0 0 2% 15px;
			padding-top: 2%;
			font-weight: 600;
		}
		.card {
			justify-content: center;
			background-color: white;
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			border-radius: 5px;
			padding: 20px;
			margin: 5%;
		}
		span {
			padding: 20px;
		}
	</style>
</head>
<body>
	<div class="menu">
		<nav>
			<ul>
				<li><a href="../dashboard.php">Dashboard</a></li>
				<li><a href="../Relatorio.php">Relatorio</a></li>
				<li><a href="../planejamento.php">Planejamento</a></li>
				<li><a href="../artigos.php">Artigos</a></li>
				<li style="float: right;"><span>Olá,</span><a href="perfil2.php"><?php echo $nome; ?></a></li>			
			</ul>
		</nav>
	</div>
	<div class="space">
		<div class="content">
			<div class="card">
			<h2>Conceitos básicos sobre economia</h2>
			<p>A economia está presente em nosso cotiano e pode se dizer que é a base para viver. Veja os conceitos básicos dela.</p>
			<h3>Oque é Economia?</h3>
			<p>Ciência que estuda as formas de comportamento humano resultantes da relação existente entre as ilimitadas necessidades a satisfazer e os recursos que, embora escassos, se prestam a usos alternativos.</p>
			<h3>Oque é Microeconomia?</h3>
			<p>Estuda o comportamento de consumidores e produtores e o mercado no qual interagem. Preocupa-se com a determinação dos preços e as quantidades em mercados específicos.</p>
			<h3>Oque é Macroeconomia?</h3>
			<p>Estuda a determinação e o comportamento dos 9 Conceito: "Estuda a determinação e o comportamento dos grandes agregados como PIB, consumo global, investimento global, exportação, inflação, desemprego, com o objetivo de delinear uma Política Econômica.</p>
			<h3>Oque é Oferta?</h3>
			<p>A oferta de determinado produto é definida pelas várias quantidades que os produtores estão dispostos e aptos a oferecer ao Mercado, em função de vários níveis possíveis de preços, em dado período.</p>
			<h3>Oque é Demanda?</h3>
			<p>A procura de determinado produto é determinada pelas várias quantidades que os consumidores estão dispostos e aptos a adquirir, em função de vários níveis possíveis de preços, em dado período.</p>
			</div>
			</a>
		</div>
	</div>
</body>
</html>