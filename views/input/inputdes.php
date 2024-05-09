<?php
	date_default_timezone_set('America/Sao_Paulo');

	include_once('conexao.php');
	session_start();
	
	$des = $_POST['valor'];
	$cat = $_POST['categoria'];
	
	$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$id = $array['id_user'];
	
	$data = date('y/m/d');
	
	if (($des == "" || $des == null) or ($cat == "" || $cat == null)){
		echo"<script language='javascript' type='text/javascript'>
		alert('Todos os campos devem ser preenchidos!');window.location.href='despesas.php'</script>";
	}
	else{
		$query = "INSERT INTO registro (dat_reg,fk_user,val_reg,cat_reg) VALUES ('$data','$id','$des','$cat')";
		$insert = mysqli_query($conexao,$query);
		
		
		echo "<script>window.close();</script>";
	}
	
?>