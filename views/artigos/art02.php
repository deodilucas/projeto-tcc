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
			<h2>Investimentos mais Rentáveis e Seguros</h2>
			<p>A maioria das pessoas investem dinheiro na poupança, mas existem aplicações financeiras mais rentáveis e tão seguras quanto a poupança. O fato de muita gente aplicar dinheiro na poupança é a facilidade e acessibilidade.</p>
			<h3>Tesouro direto</h3>
			<p>Você faz um empréstimo para o Governo Federal e recebe de volta com um juro.</p>
			<h3>Letra de Crédito Imobiliário - LCI</h3>
			<p>Essas aplicações possuem ligações diretas com o mercado imobiliário nacional.</p>
			<h3>Letra de Crédito do Agronegócio - LCA</h3>
			<p>É bastante semelhante a LCI, sendo também isenta do Imposto de Renda e contando com a garantia do Fundo Garantidor de Crédito.</p>
			<h3>Certificado de Depósito Bancário - CDB</h3>
			<p>As CDB’s também são aplicações financeiras com baixa complexidade, uma vez que são garantidas pelo Fundo Garantidor de Crédito (FGC).</p>
			<h3>Letras de Câmbio - LC</h3>
			<p>Essa modalidade de aplicação financeira, de forma geral, é disponibilizada por sociedades de crédito, investimento e financiamento, que são conhecidas no mercado brasileiro como instituições financeiras.</p>
			</div>
			</a>
		</div>
	</div>
</body>
</html>