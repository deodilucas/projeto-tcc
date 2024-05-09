<?php
	date_default_timezone_set('America/Sao_Paulo');

	include_once('conexao.php');
	session_start();
	
	$data = date('Ymd');
	
	
	$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$id = $array['id_user'];

	echo $id;
	
	$id_men = $_GET['id_men'];

	echo $id_men;
	
	$query_select = "SELECT * FROM mensalidade WHERE id_men = '$id_men'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$val = $array['valor'];
	

	echo $val;
	
	$query = "INSERT INTO registro (dat_reg,fk_user,val_reg,cat_reg) VALUES ('$data','$id','$val','Mensalidade')";
	$insert = mysqli_query($conexao,$query);


	$query = "UPDATE mensalidade SET def = 'Pago' WHERE id_men = '$id_men'";
	$update = mysqli_query($conexao,$query);

	$nom = $array['nome'];
	$data = $array['data'];
	$data = new DateTime($data);
	$data = $data->modify('+1 month');
	$data = $data->format('Y-m-d');
	
	$query = "INSERT INTO mensalidade (nome,data,valor,def,fk_us) VALUES ('$nom','$data','$val','em aberto','$id')";
	$insert = mysqli_query($conexao,$query);
	
	if($update){
		if($insert){
			echo "<script language='javascript' type='text/javascript'>window.location.href='../planejamento.php';</script>";
		}
		else{
			echo"<script language='javascript' type='text/javascript'>
			alert('Não foi possível!');window.close();'</script>";
		}
	}else{
		echo"<script language='javascript' type='text/javascript'>
		alert('Não foi possível!');window.close();'</script>";
	}
	
?>