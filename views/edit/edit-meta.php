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
		</style>
	</head>
	<body>
		<div>

			<form method='post' action=''>
				<fieldset>
					<h1>Meta<h1>
					<h3>Valor</h3>
					<input id="val" type='number' min="0.00" max="100000.00" step="0.01" name='valor' placeholder="R$"><br>
					<h3>Data limite</h3>
					<input type='date' name='data' id="data" required=""><br>
					<input id="but" type='submit' value='Alterar' required="">
					<input type="hidden" name="enviar" value="send">
				</fieldset>
			</form>
			<?php
			if (isset($_POST['enviar']) && $_POST['enviar'] == "send"){
				$val = $_POST['valor'];
				$dat = $_POST['data'];

				$id_meta = $_GET['id'];
				$query_select = "SELECT * FROM planejamento WHERE id_plan = '$id_meta' ORDER BY id_plan DESC";
				$select = mysqli_query($conexao,$query_select);
				$array = mysqli_fetch_array($select);

				if ($val == '' or $val == 0){
					$val = $array['val_plan'];
				}
				if ($dat == '') {
					$dat = $array['dat_fim'];
				}

				$query = "UPDATE planejamento SET val_plan = '$val', dat_fim = '$dat' WHERE id_plan = '$id_meta'";
				$update = mysqli_query($conexao, $query);
				if ($update) {
					echo "<script>window.close();</script>";
				} else {
					echo "erro";
				}
			}
			?>
		</div>
	</body>
</html>