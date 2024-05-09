<?php
	include_once('conexao.php');
	session_start();
?>
<html>
	<head>
		<style type="text/css">
			body {
				font-family: Poppins;
				font-weight: 600;
				background-color: #F9F9F9;
			}
			fieldset {
				width: 90%;
				background-color: white;
				border: none;
				box-shadow: 0px 2px 3px 1px rgba(0,0,0,0.1);
				border-radius: 5px;
			}
			#val {
				width: 100%;
				height: 50px;
				font-family: Rubik;
				font-size: 1.5em;
				border-radius: 5px;
				border: solid 2px #CECECE;
				padding-left: 10px;
			}
			input {
				margin: 10px 0 0 0;
			}
			#data {
				padding-left: 10px;
				font-family: Rubik;
				width: 100%;
				height: 40px;
				border-radius: 5px;
				border: solid 2px #CECECE;
				font-size: 1em;
			}
			#but {
				width: 100%;
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
			h3 {
				margin-bottom: 0%;
			}
			.but {
				font-weight: 500;
				font-family: Rubik;
				font-size: 0.8em;
			}
		</style>
	</head>
	<body>
		<div>
			<?php
			$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
			$select = mysqli_query($conexao,$query_select);
			$array = mysqli_fetch_array($select);
			$id = $array['id_user'];

			$query_select = "SELECT COUNT(id_plan) FROM planejamento WHERE fk_use = '$id' AND cat_plan = 'Despesa'";
			$select = mysqli_query($conexao,$query_select);
			$array = mysqli_fetch_array($select);
			$cond = $array['COUNT(id_plan)'];
			
			$query_select = "SELECT COUNT(id_plan) FROM planejamento WHERE fk_use = '$id' AND cat_plan = 'Saldo'";
			$select = mysqli_query($conexao,$query_select);
			$array = mysqli_fetch_array($select);
			$conr = $array['COUNT(id_plan)'];
			?>
			<form method='post' action='../input/inputplan.php'>
				<fieldset>
					<h1>Meta<h1>
					<h3>Valor</h3>
					<input id="val" type='number' min="0.00" max="100000.00" step="0.01" name='valor' placeholder="R$"><br>
					<h3>Tipo de meta</h3>
					<?php if ($conr == 0){ ?>
					<input type="radio" name="categoria" id="saldo" value="Saldo">
						<label for="saldo">Saldo</label> <?php } ?>
					<?php if ($cond == 0){ ?>
					<input type="radio" name="categoria" id="despesas" value="Despesa">
						<label for="despesas">Despesas</label><?php } ?>
					<br><span class="but">*Só pode ser criado uma de cada</span>
					<h3>Data limite</h3>
					<input type='date' name='data' id="data"><br>
					<input id="but" type='submit' value='Enviar' name='ganho'>
				</fieldset>
			</form>
		</div>
	</body>
</html>