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
	<title>Planejamento</title>
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
			grid-template-columns: 1fr 1fr;
			grid-template-rows: auto auto;
		}
		.box {
			padding: 10px;
		}
		h3 {
			font-weight: 600;
			font-family: Poppins;
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
			margin: 0 0 2% 15px;
			padding-top: 2%;
			font-weight: 600;
		}
		.card {
			margin-bottom: 3%;
			background-color: white;
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			border-radius: 5px;
			justify-content: center;
		}
		.valor {
			font-family: Rubik;
			font-size: 2em;
		}
		.icon {
			margin-left: 5px;
			height: 17px;
		}
		#but {
			width: 100%;
			border-radius: 5px;
			font-family: Poppins;
			background-color: white;
			color: #232433;
			height: 30px;
			font-weight: 600;
			border: none;
			padding: 2px;
			cursor: pointer;
			margin: 10px 0 0 0;
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		}
		#but:hover{
			color: #bababa;
		}
		a {
			text-decoration: none;
			color: #bababa;

		}
		a:hover{
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
				<?php
					$query_select = "SELECT * FROM planejamento WHERE fk_use = '$id' ORDER BY id_plan DESC";
						$select = mysqli_query($conexao,$query_select);
						$cont = mysqli_num_rows($select);
						if ($cont <= 0) {
							echo "<div class='card'><center><p style='width: 70%; margin: 0; padding: 10px'>Nenhuma meta feita ainda, crie agora e planeje sua vida!</p></center></div>";
						} else {
							while ($array = mysqli_fetch_array($select)){
						$val_plan = $array['val_plan'];
						$cat_plan = $array['cat_plan'];
						$id_meta = $array['id_plan'];

						$saldo = $gan - $des;
						$falta = $val_plan - $saldo;
						$dat_fim = $array ['dat_fim'];

						$dat_fim = new DateTime ($dat_fim);
						$data = date('Y-m-d');
						$data = new DateTime ($data);

						$interval = $data->diff($dat_fim);
						$interval = $interval->format('%R%a dias');

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
						<div class="card">
							<h4><?php echo 'Meta para '.$cat_plan; ?></h4>
							<div style="padding: 0 15px 15px 15px">
							<center>
							<h1><?php echo '<span style="color: #bababa;"> R$ '.$saldo.' <span style="color:'.$color.';">R$ '.$val_plan; ?></span></h1>
							<span style="color: <?php echo $cor ?> ; font-weight: 600; font-family: Rubik"> <?php echo $frase; ?></span><br>
							Finaliza em <span style="font-weight: 700"><?php echo $interval; ?></span><br>
							<a style="cursor: pointer; padding-right: 10px;" onClick="window.open('edit/edit-meta.php?id=<?php echo $id_meta?>', 'Envio','width=350,height=500,left=100,top=50')">Editar</a>
							<a href="delete/delete-meta.php?id=<?php echo $id_meta?>.php">Excluir</a>
							</center>
							</div>
						</div>
					<?php
					} else {
						if ($des <= $val_plan) {
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
						<div class="card">
							<h4><?php echo 'Meta para '.$cat_plan; ?></h4>
							<div style="padding: 0 15px 15px 15px">
							<center>
							<h1><?php echo '<span style="color:'.$color.';"> R$ '.$des.' <span style="color: #232433;">R$ '.$val_plan; ?></span></h1>
							<span style="color: <?php echo $cor ?> ; font-weight: 600; font-family: Rubik"> <?php echo $frase; ?></span><br>
							Finaliza em <span style="font-weight: 700"><?php echo $interval; ?></span><br>
							<a style="cursor: pointer; padding-right: 10px;" onClick="window.open('edit/edit-meta.php?id=<?php echo $id_meta?>', 'Envio','width=350,height=500,left=100,top=50')">Editar</a>
							<a href="delete/delete-meta.php?id=<?php echo $id_meta?>.php">Excluir</a>
							</center>
							</div>
						</div>
						<?php }} else { $frase = "Expirou";?>
							<div class="card">
							<h4><?php echo 'Meta para '.$cat_plan; ?></h4>
							<div style="padding: 0 15px 15px 15px">
							<center>
							<h1><?php echo '<span style="color: #bababa;"> R$ '.(($cat_plan == "Saldo")?$saldo:$des).' <span style="color: #4d4d4d;">R$ '.$val_plan; ?></span></h1>
							<span style="font-weight: 600; font-family: Rubik"> <?php echo $frase; ?></span><br>
							<a style="cursor: pointer; padding-right: 10px;" onClick="window.open('edit/edit-meta.php?id=<?php echo $id_meta?>', 'Envio','width=350,height=500,left=100,top=50')">Editar</a>
							<a href="delete/delete-meta.php?id=<?php echo $id_meta?>.php">Excluir</a>
							</center>
							</div>
						</div>
						<?php }}}
						$query_select = "SELECT COUNT(id_plan) FROM planejamento WHERE fk_use = '$id' AND cat_plan = 'Despesa'";
						$select = mysqli_query($conexao,$query_select);
						$array = mysqli_fetch_array($select);
						$cond = $array['COUNT(id_plan)'];
						
						$query_select = "SELECT COUNT(id_plan) FROM planejamento WHERE fk_use = '$id' AND cat_plan = 'Saldo'";
						$select = mysqli_query($conexao,$query_select);
						$array = mysqli_fetch_array($select);
						$conr = $array['COUNT(id_plan)'];

						if ($cond != 0 && $conr != 0) {
							echo "<center>Já foi criado todas as metas possiveis!</center>";
						} else {
						?>
				<a onClick="window.open('forms/form-meta.php', 'Envio', 'width=350,height=450,left=100,top=50')"><button id="but">Criar meta</button></a>
			<?php } ?>
			</div>
			<div class="box b">
				<?php
				$mes_ini = date('Y-m-1');
				$mes = new DateTime('+1 month');
				$mes = $mes->format('m');
				$mes_fim = date('Y-'.$mes.'-31');
				$query_select = "SELECT * FROM mensalidade WHERE fk_us = '$id' AND data BETWEEN '$mes_ini' AND '$mes_fim' ORDER BY id_men DESC ";
				$select = mysqli_query($conexao,$query_select);
				$cont = mysqli_num_rows($select);
				if ($cont <= 0) {
					echo "<div class='card'><center><p style='width: 70%; margin: 0; padding: 10px'>Nenhuma mensalidade feita ainda, crie agora e planeje sua vida!</p></center></div>";
				} else {
					while ($array = mysqli_fetch_array($select)){
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
					$cor = '#eba800';
				} else {
					$cor = '#006deb';
				}
				?>
					<div class="card">
					<h4><?php echo $nome ?></h4>
					<div style="padding: 0 15px 15px 15px">
					<center>
					<h1><?php echo '<span style="color: #bababa;"> R$ '.$saldo.' <span style="color:'.$cor.';">R$ '.$valor; ?></span></h1>
					Dia de pagamento <span style="font-weight: 700"><?php echo $data; ?></span><br>
					Situação <span style="font-weight: 700"><?php echo $situação; ?></span><br>
					</center>
					<?php if ($situação != "Pago"){ ?>
						<center><a style="cursor: pointer; padding-right: 10px;" onClick="window.open('edit/edit-mens.php?id=<?php echo $id_men?>', 'Envio','width=350,height=500,left=100,top=50')">Editar</a>
						<a href="delete/delete-mens.php?id=<?php echo $id_men?>.php">Excluir</a></center></div>
					<?php   if ($liberar == "yes") {?>
						<?php
						echo '<a href="input/pagar.php?id_men='.$id_men.'"><button id="but">Pagar</button><br></a>';
					}}
						?>
				</div>
				<?php }} ?>
				</div>
				<a onClick="window.open('forms/form-mens.php', 'Envio', 'width=350,height=450,left=100,top=50')"><button id="but">Adicionar mensalidade</button></a>
				</div>
		</div>
	</div>
</body>
</html>