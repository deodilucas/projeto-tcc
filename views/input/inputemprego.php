<?php
	include_once('conexao.php');
	date_default_timezone_set('America/Sao_Paulo');
	session_start();
	
	$cargo = $_POST['cargo'];
	$empresa = $_POST['empresa'];
	$salario = $_POST['salario'];
	$dia = $_POST['dia'];

	$hoje = date('d');

	if ($dia < $hoje){
		$mes = new DateTime('+1 month');
		$mes = $mes->format('m');
		$pagamento = date('Y-'.$mes.'-'.$dia);
	} else {
		$pagamento = date('Y-m-'.$dia);
	}

	$query_select = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao, $query_select);
	$array = mysqli_fetch_assoc($select);
	$id = $array['id_user'];

	$query = "INSERT INTO emprego (cargo, empresa, salario, pagamento, fk_user) VALUES ('$cargo','$empresa','$salario', '$pagamento', '$id')";
	$insert = mysqli_query($conexao,$query);

	if ($insert) {
		echo "<script>window.close();</script>";
	}
	
?>