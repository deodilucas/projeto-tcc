<?php
	include_once('../conexao.php');
	session_start();
	$query_select = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao, $query_select);
	$array = mysqli_fetch_assoc($select);
	$id = $array['id_user'];

	$sql = "DELETE FROM emprego WHERE fk_user='$id'";
	$deletepost = mysqli_query ($conexao, $sql);
	header('location: ../perfil2.php');

?>