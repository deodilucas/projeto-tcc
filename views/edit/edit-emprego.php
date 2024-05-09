<?php
	include_once('../conexao.php');
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
			select {
				padding-left: 10px;
				font-family: Rubik;
				width: 100%;
				height: 40px;
				border-radius: 5px;
				border: solid 2px #CECECE;
				font-size: 1em;
			}
			#nome {
				width: 100%;
				height: 50px;
				font-family: Poppins;
				font-size: 1.5em;
				border-radius: 5px;
				border: solid 2px #CECECE;
				padding-left: 10px;
			}
		</style>
	</head>
	<body>
		<div>

			<form method='POST' action=''>
				<fieldset>
					<h1>Emprego<h1>
					<h3>Cargo*</h3>
					<input id="nome" type="text" name="cargo" required="">
					<h3>Empresa/Instituição</h3>
					<input id="nome" type="text" name="empresa">
					<h3>Salario*</h3>
					<input id="val" type='number' min="0.00" max="100000.00" step="0.01" name='salario' placeholder="R$" required=""><br>
					<h3>Dia de pagamento*</h3>
					<select name="dia">
						<?php
						for ($i=1; $i <= 30; $i++) {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
						?>
					</select>
					<input id="but" type='submit' value='Alterar'>
					<input type="hidden" name="enviar" value="send">
				</fieldset>
			</form>
			<?php
			if (isset($_POST['enviar']) && $_POST['enviar'] == "send"){
			$cargo = $_POST['cargo'];
			$empresa = $_POST['empresa'];
			$salario = $_POST['salario'];
			$dia = $_POST['dia'];

			$query_select = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
			$select = mysqli_query($conexao, $query_select);
			$array = mysqli_fetch_assoc($select);
			$id = $array['id_user'];

			$query_select = "SELECT * FROM emprego WHERE fk_user = '$id'";
			$select = mysqli_query($conexao, $query_select);
			$array = mysqli_fetch_assoc($select);
			$pagamento = $array['pagamento'];

			$pagamento = new DateTime($pagamento);
			$pagamento = $pagamento->format('Y-m');

			$pagamento = date($pagamento.'-'.$dia);

			echo $pagamento;

			$query = "UPDATE emprego SET pagamento = '$pagamento', cargo = '$cargo', empresa = '$empresa', salario = '$salario' WHERE fk_user = '$id'";
			$update = mysqli_query($conexao, $query);
			if ($update) {
				echo "<script>window.close();</script>";
			}
			}
			?>
		</div>
	</body>
</html>