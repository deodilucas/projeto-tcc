<?php
date_default_timezone_set('America/Sao_Paulo');
include_once('conexao.php');
session_start();

	$data = date('Y/m/d');
	
    $nome = $_POST["nome"];
    $nasc  = $_POST["nasc"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $confemail = $_POST["confemail"];
    $confsenha = md5($_POST["confsenha"]);

    $dat= date('Y');
	$dat = intval($dat);
	$data = intval($nasc);
	$idd = $dat-$data;

			if ($confemail != $email) {
				echo"<script language='javascript' type='text/javascript'>
				  alert('Os emails digitados devem ser iguais!');window.location.
				  href='index.html'</script>";
			} else if ($confsenha != $senha) {
				echo"<script language='javascript' type='text/javascript'>
				  alert('As senhas digitadas devem ser iguais!');window.location.
				  href='index.html'</script>";
			} else {
            $query_select = "SELECT email FROM usuario WHERE email = '$email'";
			$select = mysqli_query($conexao,$query_select);
			$array = mysqli_fetch_array($select);
			$logarray = $array['email'];
			
			if(($nome == "" || $nome == null) or ($email == "" || $email == null) or ($senha == "" || $senha == null) or ($nasc == "" || $nasc == null)){
			echo"<script language='javascript' type='text/javascript'>
				  alert('Todos os campos devem ser preenchidos!')</script>";
		 
			}else{
				if($idd < 12){
					echo"<script language='javascript' type='text/javascript'>
						  alert('Idade Não Aceitavel!');window.location.
						  href='index.html'</script>";
				}
				else{
					if($logarray == $email){
						echo"<script language='javascript' type='text/javascript'>
						  alert('Email ja cadastrado!');window.location.
						  href='index.html'</script>";
			
					}else{
						$query = "INSERT INTO usuario (nome,email,senha,nasc,img) VALUES ('$nome','$email','$senha','$nasc','foto.jpg')";

						$_SESSION["email"]=$email;

						$insert = mysqli_query($conexao,$query);
						
						if($insert){
						echo"<script language='javascript' type='text/javascript'>
						alert('Cadastro realizado com sucesso!');window.location
							.href='perfil2.php'</script>";
						}else{
							echo"<script language='javascript' type='text/javascript'>
							alert('Não foi possível cadastrar esse usuário.');window.location
							.href='index.html'</script>";
						}
					}
				}
			}
		}
 ?>