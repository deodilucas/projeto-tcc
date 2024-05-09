<?php
	include_once('conexao.php');
	session_start();
?>
<html>
	<head>
		<style type="text/css">
			body {
				font-family: Open Sans;
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
				font-family: Merriweather;
				font-size: 1.5em;
				border-radius: 5px;
				border: solid 2px #CECECE;
				padding-left: 10px;
			}
			input {
				margin: 10px 0 0 0;
				font-family: Merriweather;
				width: 100%;
				height: 40px;
				border-radius: 5px;
				border: solid 2px #CECECE;
				font-size: 1em;

			}
			#data {
				padding-left: 10px;
				font-family: Open Sans;
				width: 100%;
				height: 40px;
				border-radius: 5px;
				border: solid 2px #CECECE;
				font-size: 1em;
			}
			select {
				padding-left: 10px;
				font-family: Open Sans;
				width: 100%;
				height: 40px;
				border-radius: 5px;
				border: solid 2px #CECECE;
				font-size: 1em;
			}
			#but {
				width: 100%;
				border-radius: 5px;
				font-family: Merriweather;
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

			<form method='post' action='../input/inputimg.php' enctype="multipart/form-data">
				<fieldset>
					<h1>Alterar<h1>
					<h3>Nome</h3>
					<input type='nome' name='nome'>
					<br>			
					<h3>Senha</h3>
					<input type='password' name='pass'>
					<br>
					<h3>Imagem<h3>
					<input type="file" name="img">
					<input id="but" type='submit' value='Enviar'>
				</fieldset>
			</form>
		</div>
	</body>
</html>