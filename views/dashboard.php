<?php
	include_once('conexao.php');
	session_start();
	include_once('user.php');
	include_once('saldo.php');
	include_once('mes.php');
	date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../ativos/icons/logov3.ico" />
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
			color: #bababa;
		}
		a:hover{
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
			display: grid;
			grid-template-columns: 1fr 1fr 1fr;
			grid-template-rows: auto auto;
		}
		.box {
			padding: 10px;
		}
		.d {
			grid-column: 1/3;
			grid-row: 2/4;
		}
		.e {
			grid-column: 3;
			grid-row: 2;
		}
		.f {
			grid-column: 3;
		}
		.card {
			justify-content: center;
			background-color: white;
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			border-radius: 5px;
			margin: 0 0 20px 0;
		}
		h1 {
			font-family: Rubik;
			margin: 0%;
			font-size: 3em;
		}
		h2 {
			font-family: Poppins;
		}
		h4 {
			font-family: Poppins;
			margin: 0 0 2% 15px;
			padding-top: 2%;
			font-weight: 600;
		}
		table {
			width: 100%;
		}
		td {
			text-align: center;
		}
		#but {
			width: 85%;
			border-radius: 5px;
			font-family: Poppins;
			background-color: black;
			color: white;
			height: 30px;
			font-weight: 600;
			border: none;
			padding: 2px;
			cursor: pointer;
		}
		p {
			padding: 50px;
			margin: 0%;
		}
		#chart {
			padding: 10px;
		}
		.icon {
			margin-left: 5px;
			height: 17px;
		}
		.valor {
			font-family: Rubik;
			font-size: 2em;
			color: #232433;
		}
	</style>
</head>
<body>
	<div class="menu">
		<nav>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="Relatorio.php">Relatorio</a></li>
				<li><a href="planejamento.php">Planejamento</a></li>
				<li><a href="artigos.php">Artigos</a></li>
				<li style="float: right;"><span>Olá,</span><a href="perfil2.php"><?php echo $nome; ?></a></li>
				<li style="float: right; padding: 2px 40px;">Orçamento <span style="font-weight: 700"><?php echo $mes_name; ?></span></li>
			</ul>
		</nav>
	</div>
	<div class="space">
		<div class="content">
			<div class="box a">
				<div class="card" style="height: 100%; margin: 0">
					<h4>Renda</h4>
					<center>
					<a style="cursor: pointer;" onClick="window.open('forms/form-renda.php', 'Envio', 'width=350,height=300,left=100,top=50')">
					<span style="color: #35CE93"><h1>R$ <?php echo $gan; ?></h1></span>
					Adcionar</a>
					</center>
				</div>
			</div>
			<div class="box b">
				<div class="card" style="height: 100%; margin: 0">
					<h4>Saldo</h4>
					<center>
					<span><h1>R$ <?php echo $saldo; ?></h1></span>
					<span style="color: #bababa">Saldo total R$ <?php echo $saldo_t; ?></span>
					</center>
				</div>
			</div>
			<div class="box c">
				<div class="card" style="height: 100%; margin: 0">
					<h4>Despesa</h4>
					<center>
					<span style="color: #FF4B4B"><h1>R$ <?php echo $des; ?></h1></span>
					<a style="cursor: pointer;" onClick="window.open('forms/form-despesa.php', 'Envio', 'width=350,height=450,left=100,top=50')">Adcionar</a>
					</center>
				</div>
			</div>
			<div class="box d">
				<div class="card" style="padding-bottom: 10px">
				<h4>Ultimos 10 registros</h4>
					<table>
						<?php
						$query_select = "SELECT * FROM registro WHERE fk_user = '$id' ORDER BY id_reg DESC";
						$select = mysqli_query($conexao,$query_select);
						$cont = mysqli_num_rows($select);
						if ($cont <= 0) {
							echo "<center><p>Nenhum dado para mostrar, adicione suas despesas e rendas do seu dia!</p></center>";
						} else {
							?>
						<tr>
							<th>Valor</th>
							<th>Tipo</th>
							<th>Data</th>
							<th>Categoria</th>
							<th></th>
						</tr>
						<?php
							$cont = 0;
							while ($row = mysqli_fetch_array($select) and $cont <= 10){
								$cont++;
								$val = $row['val_reg'];
								$data = $row['dat_reg'];
								$data = date('d/m/Y', strtotime($data));
								$cat = $row['cat_reg'];
								$id_reg = $row['id_reg'];

								$hoje = date('d/m/Y');
								$ontem = new DateTime('-1 day');
								$ontem = $ontem->format('d/m/Y');

								if ($data == $hoje){
									$data = "Hoje";
								} else if ($data == $ontem){
									$data = "Ontem";
								}

								if (is_null($row['cat_reg']) or $cat == 'Salário'){
									$tipo = 'Renda';
									$cor = '#35CE93';
								} else {
									$tipo = 'Despesa';
									$cor = '#FF4B4B';
								}
						?>
						<tr>
							<td><?php echo 'R$ '.$val; ?></td>
							<td style="color: <?php echo $cor; ?>"><?php echo $tipo; ?></td>
							<td><?php echo $data; ?></td>
							<td><?php echo $cat; ?></td>
							<td><?php if ($cat != "Mensalidade" and $cat != "Salário") { echo '<a href="delete/delete-reg.php?id='.$id_reg.'">Excluir</a>';}?></td>
						</tr>
					<?php }} ?>
					</table>
				</div>
			</div>
			<div class="box e">
				<div class="card">
					<?php
					$query_select = "SELECT * FROM planejamento WHERE fk_use = '$id' ORDER BY dat_fim";
						$select = mysqli_query($conexao,$query_select);
						$cont = mysqli_num_rows($select);
						if ($cont <= 0) {
							echo "<p>Nenhuma meta feita ainda, crie agora e planeje sua vida!</p>";
						} else {
						$array = mysqli_fetch_array($select);
						$val_plan = $array['val_plan'];
						$cat_plan = $array['cat_plan'];

						$saldo = $gan - $des;
						$falta = $val_plan - $saldo;
						$dat_fim = $array ['dat_fim'];

						$dat_fim = new DateTime ($dat_fim);
						$data = date('Y-m-d');
						$data = new DateTime ($data);
						$interval = $data->diff($dat_fim);
						$interval = $interval->format('%d dias');

						if ($data <= $dat_fim) {
						if ($cat_plan == "Saldo") {
							if ($saldo >= $val_plan) {
							$color = "#35CE93";
							$cor = "#35CE93";
							$frase = "Na meta";
						} else {
							$color = "#FF4B4B";
							$cor = "#FF4B4B";
							$frase = "Fora da meta";
						}?>
							<h4><?php echo 'Meta para '.$cat_plan; ?></h4>
							<div style="padding: 0 15px 15px 15px">
							<center>
							<h1><?php echo '<span style="color:'.$color.';">R$ '.$val_plan; ?></span></h1>
							<span style="color: <?php echo $cor ?> ; font-weight: 600; font-family: Rubik"> <?php echo $frase; ?></span><br>
							Finaliza em <span style="font-weight: 700"><?php echo $interval; ?></span><br>
							</center>
							</div>
					<?php
					} else {
						if ($des < $val_plan) {
							$color = "#35CE93";
							$cor = "#35CE93";
							#35CE93
							#bababa
							$frase = "Na Meta";
						} else {
							$color = "#FF4B4B";
							$cor = "#FF4B4B";
							$frase = "Fora da meta";
						}?>
							<h4><?php echo 'Meta para '.$cat_plan; ?></h4>
							<div style="padding: 0 15px 15px 15px">
							<center>
							<h1><?php echo '<span style="color: #232433;">R$ '.$val_plan; ?></span></h1>
							<span style="color: <?php echo $cor ?> ; font-weight: 600; font-family: Rubik"> <?php echo $frase; ?></span><br>
							Finaliza em <span style="font-weight: 700"><?php echo $interval; ?></span><br>
							</center>
							</div>
						<?php }} else { $frase = "Expirou";?>
							<h4><?php echo 'Meta para '.$cat_plan; ?></h4>
							<div style="padding: 0 15px 15px 15px">
							<center>
							<h1><?php echo '<span style="color: #bababa;">R$'.$val_plan; ?></span></h1>
							<span style="font-weight: 600; font-family: Rubik; color: #bababa"> <?php echo $frase; ?></span><br>
							</center>
							</div>
						<?php }} ?>
			</div>
				<div class="card">
				<?php
				$mes_ini = date('Y-m-1');
				$mes_fim = date('Y-m-31');
				$query_select = "SELECT * FROM mensalidade WHERE fk_us = '$id' AND data BETWEEN '$mes_ini' AND '$mes_fim' ORDER BY def";
				$select = mysqli_query($conexao,$query_select);
				$cont = mysqli_num_rows($select);
				if ($cont <= 0) {
					echo "<p>Nenhuma mensalidade feita ainda, crie agora e planeje sua vida!</p>";
				} else {
				$array = mysqli_fetch_array($select);
				$valor = $array['valor'];
				$nome = $array['nome'];
				$id_men = $array['id_men'];
				$data = $array['data'];

				$data_min = new DateTime($data);
				$data_min = $data_min->modify('-3 day');
				$data_min = $data_min->format('d/m');
				$data_max = new DateTime($data);
				$data_max = $data_max->modify('+3 day');
				$data_max = $data_max->format('d/m');

				$hoje = new DateTime();
				$hoje = $hoje->format('d/m');

				$data = date('d/m', strtotime($data));

				if ($hoje>$data_min && $hoje<$data_max){
					$liberar = "yes";
				} else {
					$liberar = "no";
				}

				$situação = $array['def'];
				if ($situação != "Pago"){
					$cor = '#FF4B4B';
				} else {
					$cor = '#35CE93';
				}

				?>
					<h4><?php echo $nome ?></h4>
					<div style="padding: 0 15px 15px 15px">
					<center>
					<h1><?php echo '<span style="color: #006deb;">R$ '.$valor; ?></span></h1>
					Dia de pagamento <span style="font-weight: 700"><?php echo $data; ?></span><br>
					Situação <span style="font-weight: 700"><?php echo $situação; ?></span><br>
					</center>
					</div>
				<?php } ?>
				</div>
				<div class="card">
					<h4>Artigos</h4>
					<div style="text-align: center; padding-bottom: 10px; margin: 5%;">
					<a style="color: #232433" href="artigos/art02.php">
						<h2>Investimentos mais Rentáveis e Seguros</h2>
					</a>
					<a style="color: #232433" href="artigos/art01.php">
						<h2>Conceitos basicos sobre economia</h2>
					</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>