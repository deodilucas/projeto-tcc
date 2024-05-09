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
	<link rel="shortcut icon" href="../ativos/icons/logov3.ico"/>
	<meta charset="utf-8">
	<title>Relatorio</title>
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
		}
		.e {
			grid-column: 3;
			grid-row: 2;
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
			font-family: Rubik;
			padding: 5%;
		}
		h4 {
			font-family: Poppins;
			margin: 0 0 5px 15px;
			padding-top: 5px;
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
			font-family: Rubik;
			background-color: black;
			color: white;
			height: 30px;
			font-weight: 600;
			border: none;
			padding: 2px;
			cursor: pointer;
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
				<div class="card">
					<h4>Comparação</h4>
					<?php
					$hoje = new DateTime();
					$hoje = $hoje->format('Y-m-d');
					$ontem = new DateTime('-1 day');
					$ontem = $ontem->format('Y-m-d');
					$antontem = new DateTime('-2 day');
					$antontem = $antontem->format('Y-m-d');

					//anteontem
					$select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário')) AND dat_reg = '$antontem'";
					$result = mysqli_query($conexao,$select);
					$array = mysqli_fetch_array($result);
					$des_antontem = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg = '$antontem'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$gan_antontem = $array['SUM(val_reg)'];

					$gan_antontem = $gan_antontem+0;
					$des_antontem = $des_antontem+0;

					//ontem
					$select_ontem = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário')) AND dat_reg = '$ontem'";
					$result = mysqli_query($conexao,$select_ontem);
					$array = mysqli_fetch_array($result);
					$des_ontem = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND dat_reg = '$ontem'AND (cat_reg IS NULL or cat_reg = 'Salário')";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$gan_ontem = $array['SUM(val_reg)'];

					$gan_ontem = $gan_ontem+0;
					$des_ontem = $des_ontem+0;
					

					//hoje
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND dat_reg = '$hoje' AND (cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário'))";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$des_hj = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND dat_reg = '$hoje'AND (cat_reg IS NULL or cat_reg = 'Salário')";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$gan_hj = $array['SUM(val_reg)'];

					$gan_hj = $gan_hj+0;
					$des_hj = $des_hj+0;

					//saldos
					$saldo_hj = $gan_hj - $des_hj;
					$saldo_ontem = $saldo-$saldo_hj;
					$saldo_tontem = $gan_ontem-$des_ontem;
					$saldo_antontem = $saldo_ontem-$saldo_tontem;
					?>
					<canvas id="registros" height="100px"></canvas>
				</div>
				<div class="card">
					<h4>Ultimos meses</h4>
					<?php
					//mes_atual
					$mes_0 = new DateTime();
					$mes_0 = new DateTime("-0 month");
					$ini = $mes_0->format('Y-m-01');
					$fim = $mes_0->format('Y-m-31');
					$mes_0 = ($mes_0->format('m'))+0;
					$mes_0 = $mes[$mes_0];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$despesas_0 = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$receita_0 = $array['SUM(val_reg)'];

					$balanço_0 = $receita_0 - $despesas_0;
					$balanço_0 = 1000;

					//mes_1
					$mes_1 = new DateTime();
					$mes_1 = new DateTime("-1 month");
					$ini = $mes_1->format('Y-m-01');
					$fim = $mes_1->format('Y-m-31');
					$mes_1 = ($mes_1->format('m'))+0;
					$mes_1 = $mes[$mes_1];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$despesas_1 = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$receita_1 = $array['SUM(val_reg)'];

					$balanço_1 = $receita_1 - $despesas_1;
					$balanço_1 = 500;

					//mes_2
					$mes_2 = new DateTime();
					$mes_2 = new DateTime("-2 month");
					$ini = $mes_2->format('Y-m-01');
					$fim = $mes_2->format('Y-m-31');
					$mes_2 = ($mes_2->format('m'))+0;
					$mes_2 = $mes[$mes_2];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$despesas_2 = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$receita_2 = $array['SUM(val_reg)'];

					$balanço_2 = $receita_2 - $despesas_2;

					//mes_3
					$mes_3 = new DateTime();
					$mes_3 = new DateTime("-3 month");
					$ini = $mes_3->format('Y-m-01');
					$fim = $mes_3->format('Y-m-31');
					$mes_3 = ($mes_3->format('m'))+0;
					$mes_3 = $mes[$mes_3];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$despesas_3 = $array['SUM(val_reg)'];

					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg BETWEEN '$ini' AND '$fim'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$receita_3 = $array['SUM(val_reg)'];

					$balanço_3 = $receita_3 - $despesas_3;
					?>
				<canvas id="mes" height="150px"></canvas>
				</div>
			</div>
			<div class="box e">
				<div class="card">
					<h4>Despesa por Categoria</h4>
					<?php
					$query_select = "SELECT * FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário')";
					$select = mysqli_query($conexao,$query_select);
					$cont = mysqli_num_rows($select);

					//alimentação
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Alimentação'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$ali = $array['SUM(val_reg)'];

					//transporte
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Transporte'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$trans = $array['SUM(val_reg)'];

					//lazer
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Lazer'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$laz = $array['SUM(val_reg)'];

					//educação
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Educação'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$edu = $array['SUM(val_reg)'];

					//saúde
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Saúde'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$sau = $array['SUM(val_reg)'];

					//moradia
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Moradia'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$mor = $array['SUM(val_reg)'];

					//pessoal
					$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg = 'Pessoal'";
					$select = mysqli_query($conexao,$query_select);
					$array = mysqli_fetch_array($select);
					$pess = $array['SUM(val_reg)'];

					?>
					<canvas id="categoria" height="250px" style="padding-bottom: 10px"></canvas>
				</div>
				<div class="card">
					<h4>Percentual</h4>
					<?php
					//balanço
					if ($balanço_1 == 0){
						$perc_b = 0;
					} else {
					$perc_b = ($balanço_0-$balanço_1)/$balanço_1*100;
					}

					if ($perc_b > 0){
						$color = "#8800ff";
						$frase = "Aumento de";
					} else {
						$color = "#35CE93";
						$frase = "Queda de";
					}

					//receita
					if ($receita_1 == 0){
						$perc_r = 0;
					} else {
					$perc_r = ($receita_0-$receita_1)/$receita_1*100;
					}
					//despesas
					if ($despesas_1 == 0){
						$perc_d = 0;
					} else {
					$perc_d = ($despesas_0-$despesas_1)/$despesas_1*100;
					}
					?>
					<div style="padding: 0 15px 15px 15px; text-align: center;">
					<span style="color: #bababa; font-weight: 600;"><?php echo "De ".$mes_1." para ".$mes_0 ?></span><br>
					<?php echo "<h1 style='font-size: 4em;'>".$perc_b."%</h1>"?>
					<span style="color: #35CE93; font-weight: 600; padding: 10px;">+$ <?php echo $perc_d; ?>%</span>
					<span style="color: #FF4B4B; font-weight: 600; padding: 10px;">-$ <?php echo $perc_r; ?>%</span>
					</div>
				</div>
				<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
				<script type="text/javascript">
					var ctx = document.getElementById('categoria').getContext('2d');
					var chart = new Chart(ctx, {
				    // The type of chart we want to create
				    type: 'doughnut',

				    // The data for our dataset
				    data: {
				        labels: ['Alimentação','Transporte','Lazer','Educação','Saúde','Moradia','Pessoal'],
				        datasets: [{
				            label: 'My First dataset',
				            data: [
				            <?php
				            echo $ali.','.$trans.','.$laz.','.$edu.','.$sau.','.$mor.','.$pess;
				            ?>
				            ],
				            backgroundColor: [
				            'rgb(237, 158, 0)',
				            'rgb(255, 94, 0)',
				            'rgb(12, 196, 36)',
				            'rgb(18, 172, 199)',
				            'rgb(199, 0, 0)',
				            'rgb(189, 199, 0)',
				            'rgb(158, 0, 237)',
				            ],
				            
				        }]
				    },
				    // Configuration options go here
				    options: {}
					});

					var ctx = document.getElementById('registros').getContext('2d');
					var chart = new Chart(ctx, {
				    // The type of chart we want to create
				    type: 'line',
				    // The data for our dataset
				    data: {
				        labels: [ 'Anteontem','Ontem','Hoje'],
				        datasets: [{
				            label: 'Saldo',
				            backgroundColor: 'rgba(35, 36, 51)',
				            borderColor: 'rgba(35, 36, 51)',
				            data: [<?php echo $saldo_antontem.','.$saldo_ontem.','.$saldo; ?>],
				            fill: false,
				        }, {
				            label: 'Despesa',
				            backgroundColor: 'rgba(255, 75, 75)',
				            borderColor: 'rgba(255, 75, 75)',
				            data: [<?php echo $des_antontem.','.$des_ontem.','.$des_hj; ?>],
				            fill: false,
				        },{
				            label: 'Renda',
				            backgroundColor: 'rgba(53, 206, 147)',
				            borderColor: 'rgba(53, 206, 147)',
				            data: [<?php echo $gan_antontem.','.$gan_ontem.','.$gan_hj ?>],
				            fill: false,
				        }
				        ]

				    },
				    // Configuration options go here
				    options: {
				            // This more specific font property overrides the global property
				        }
				    });

				    var ctx = document.getElementById('mes').getContext('2d');
					var chart = new Chart(ctx, {
				    // The type of chart we want to create
				    type: 'bar',
				    // The data for our dataset
				    data: {
				        labels: [<?php echo "'".$mes_3."','".$mes_2."','".$mes_1."','".$mes_0."'";?>],
				        datasets: [{
				            label: 'Balanço',
				            backgroundColor: 'rgba(35, 36, 51)',
				            borderColor: 'rgba(35, 36, 51)',
				            data: [<?php echo $balanço_3.','.$balanço_2.','.$balanço_1.','.$balanço_0 ?>],
				            fill: false,
				        }, {
				            label: 'Despesa',
				            backgroundColor: 'rgba(255, 75, 75)',
				            borderColor: 'rgba(255, 75, 75)',
				            data: [<?php echo $despesas_3.','.$despesas_2.','.$despesas_1.','.$despesas_0 ?>],
				            fill: false,
				        },{
				            label: 'Renda',
				            backgroundColor: 'rgba(53, 206, 147)',
				            borderColor: 'rgba(53, 206, 147)',
				            data: [<?php echo $receita_3.','.$receita_2.','.$receita_1.','.$receita_0 ?>],
				            fill: false,
				        }
				        ]
				    },
				    // Configuration options go here
				    options: {
				            // This more specific font property overrides the global property
				        }
				    });
				</script>
			</div>
		</div>
	</div>
</body>
</html>