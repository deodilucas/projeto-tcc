<?php
	include_once('../conexao.php');
	session_start();
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM registro WHERE id_reg='$id'";
	$deletereg = mysqli_query ($conexao, $sql);
	if ($deletereg){
	header('location: ../relatorio.php');
	}
	}

?>