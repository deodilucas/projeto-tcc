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
				font-family: Poppins;
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
			select {
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

			<form method='post' action='../input/inputdes.php'>
				<fieldset>
					<h1>Despesa<h1>
					<h3>Valor</h3>
					<input id="val" type='number' min="0.00" max="100000.00" step="0.01" name='valor' placeholder="R$"><br>
					<h3>Categoria</h3>
					<select name="categoria">
						<option value="Alimentação">Alimentação</option>
						<option value="Transporte">Transporte</option>
						<option value="Lazer">Lazer</option>
						<option value="Educação">Educação</option>
						<option value="Pessoal">Saúde</option>
						<option value="Moradia">Moradia</option>
						<option value="Pessoal">Pessoal</option>
					</select>
					<input id="but" type='submit' value='Enviar' name='ganho'>
				</fieldset>
			</form>
		</div>
	</body>
</html>