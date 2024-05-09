<?php
	include_once('conexao.php');
	date_default_timezone_set('America/Sao_Paulo');

	// SELECIONAR DADOS DO USUARIO
	$query_select = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao, $query_select);
	$array = mysqli_fetch_assoc($select);
	$nome = $array['nome'];
	$id = $array['id_user'];
	$pic_perfil = $array['img'];
	$dat= date('y');
	
?>