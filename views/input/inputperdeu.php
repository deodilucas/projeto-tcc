<?php
	date_default_timezone_set('America/Sao_Paulo');
	
	include_once('conexao.php');
	session_start();
	
	$nom = $_POST['nome'];
	$val = $_POST['valor'];
	$dat = $_POST['data'];
	
	$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$id = $array['id_user'];
	
	if (($val == "" || $val == null) or ($dat == "" || $dat == null)){
		echo"<script language='javascript' type='text/javascript'>
		alert('Todos os campos devem ser preenchidos!');window.location.href='planejamento.php'</script>";
	}
	else{
		$query = "INSERT INTO mensalidade (nome,data,valor,def,fk_us) VALUES ('$nom','$dat','$val','em aberto','$id')";
		$insert = mysqli_query($conexao,$query);
		if($insert){
			echo "<script>window.close();</script>";
		}
		else{
			echo "erro";
		}
	}
	
?>