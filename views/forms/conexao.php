<?php
    $host = "localhost";
    $user = "root";
    $senha = "";
    $banco = "pyramids";
    $conexao = mysqli_connect($host,$user,$senha,$banco);

        if(!$conexao){
			die ("Problemas com a conexão");
        }
		function fechar(){
			@mysqli_close($con);
			return;
		}

?>