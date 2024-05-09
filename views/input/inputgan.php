<?php
	date_default_timezone_set('America/Sao_Paulo'); 
	
	include_once('conexao.php');
	session_start();
	
	$gan = $_POST['valor'];
	
	$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$id = $array['id_user'];
	
	$data = date('y/m/d');
	
	if ($gan == "" || $gan == null){
		echo"<script language='javascript' type='text/javascript'>
		alert('Todos os campos devem ser preenchidos!');window.location.href='ganho.php'</script>";
	}
	else{
		$query = "INSERT INTO registro (dat_reg,fk_user,val_reg) VALUES ('$data','$id','$gan')";
		$insert = mysqli_query($conexao,$query);
		
		echo "<script>window.close();</script>";
	}
	
?>