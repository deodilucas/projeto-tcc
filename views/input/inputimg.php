<?php
	include_once('conexao.php');
	session_start();
	
	$query_select = "SELECT id_user FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$id = $array['id_user'];
	
	$nome = $_POST["nome"];
    $pass = $_POST["pass"];

    echo $nome;
	
	$dir = '../imagens\/';
	$tmpName = $_FILES['img']['tmp_name'];
	$name = $_FILES['img']['name'];

	echo $name;
	
	if (($name == "" || $name == null) and ($nome == "" || $nome == null) and ($pass == "" || $pass == null)){
		echo"<script language='javascript' type='text/javascript'>
		alert('Nenhuma Alteração!');window.close();</script>";
	}
	else{
		if($name == "" || $name == null){
			if($nome == "" || $nome == null){
				$query = "UPDATE usuario SET senha = '$pass' WHERE id_user = '$id'";
				$update = mysqli_query($conexao,$query);
				if($update){
					echo"<script language='javascript' type='text/javascript'>
					alert('Usuario alterado com sucesso!');window.close();</script>";
				}else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Não foi possível alterar!');window.close();</script>";
				}
			}
			else if($pass == "" || $pass == null){
				$query = "UPDATE usuario SET nome = '$nome' WHERE id_user = '$id'";
				$update = mysqli_query($conexao,$query);
				if($update){
					echo"<script language='javascript' type='text/javascript'>
					alert('Usuario alterado com sucesso!');window.close();</script>";
				}else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Não foi possível alterar!');window.close();'</script>";
				}
			}
			else{
				$query = "UPDATE usuario SET nome = '$nome', senha = '$pass' WHERE id_user = '$id'";
				$update = mysqli_query($conexao,$query);
				if($update){
					echo"<script language='javascript' type='text/javascript'>
					alert('Usuario alterado com sucesso!');window.close();</script>";
				}else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Não foi possível alterar!');window.close();</script>";
				}
			}
		}else{
			if($nome == "" || $nome == null){
				$query = "UPDATE usuario SET img = '$name', senha = '$pass' WHERE id_user = '$id'";
				$update = mysqli_query($conexao,$query);
				
				if($update){
					if( move_uploaded_file( $tmpName, $dir . $name) ) {
						echo"<script language='javascript' type='text/javascript'>
						alert('Usuario alterada com sucesso!');window.close();</script>";
					} else {		
						echo "<script language='javascript' type='text/javascript'>
						alert('ERRO!');window.close();</script>";	
					}
				}
				else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Não foi possível alterar!');window.close();</script>";
				}
			}
			else if($pass == "" || $pass == null){
				$query = "UPDATE usuario SET img = '$name', nome = '$nome' WHERE id_user = '$id'";
				$update = mysqli_query($conexao,$query);
				
				if($update){
					if( move_uploaded_file( $tmpName, $dir . $name) ) {
						echo"<script language='javascript' type='text/javascript'>
						alert('Usuario alterada com sucesso!');window.close();</script>";
					} else {		
						echo "<script language='javascript' type='text/javascript'>
						alert('ERRO!');window.close();</script>";	
					}
				}
				else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Não foi possível alterar!');window.close();</script>";
				}
			}
			else{
				$query = "UPDATE usuario SET img = '$name', nome = '$nome', senha = '$pass' WHERE id_user = '$id'";
				$update = mysqli_query($conexao,$query);
				
				if($update){
					if( move_uploaded_file( $tmpName, $dir . $name) ) {
						echo"<script language='javascript' type='text/javascript'>
						alert('Usuario alterada com sucesso!');window.close();</script>";
					} else {		
						echo "<script language='javascript' type='text/javascript'>
						alert('ERRO!');window.close();</script>";	
					}
				}
				else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Não foi possível alterar!');window.close();</script>";
				}
			}
		}
	}