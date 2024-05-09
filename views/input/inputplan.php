<?php
	date_default_timezone_set('America/Sao_Paulo');
	
	include_once('conexao.php');
	session_start();
	
	$val = $_POST['valor'];
	$cat = $_POST['categoria'];
	$datfim = $_POST['data'];
	
	$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$id = $array['id_user'];
	
	$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$des = $array['SUM(val_reg)'];
	
	$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NULL";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$gan = $array['SUM(val_reg)'];
	
	$saldo = $gan - $des;
	
	$datini = date('y/m/d');
	
	if($saldo == $val){
		echo"<script language='javascript' type='text/javascript'>
		alert('Meta já alcançada!');window.location.
		href='planejamento.php'</script>";
	}
	else{
			if (($val == "" || $val == null) or ($datfim == "" || $datfim == null)){
			echo"<script language='javascript' type='text/javascript'>
			alert('Todos os campos devem ser preenchidos!');window.location.href='planejamento.php'</script>";
		}
		else{
			$query = "INSERT INTO planejamento (dat_fim,dat_ini,fk_use,val_plan,cat_plan) VALUES ('$datfim','$datini','$id','$val','$cat')";
			$insert = mysqli_query($conexao,$query);
			
			echo "<script>window.close();</script>";
		}
	}
	
?>