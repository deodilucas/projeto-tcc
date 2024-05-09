<?php
	include_once('../conexao.php');
	session_start();
	if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM planejamento WHERE id_plan='$id'";
	$deletepost = mysqli_query ($conexao, $sql);
	header('location: ../planejamento.php');
	}
?>