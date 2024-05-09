<?php
    include_once('conexao.php');
    session_start();

            $email = $_POST["email"];
            $pass = $_POST["senha"];
            
            $consulta = mysqli_query($conexao,"SELECT * FROM usuario WHERE email = '$email' AND senha = '$pass'") or die (mysqli_error($conexao));
            $linhas = mysqli_num_rows($consulta);

            if($linhas == 0){
                echo"<script language='javascript' type='text/javascript'>
				  alert('Erro ao logar.');window.location.
				  href='cad.html'</script>";
            } else {
                $_SESSION["email"]=$_POST["email"];
                $_SESSION["senha"]=$_POST["senha"];
                echo"<script language='javascript' type='text/javascript'>
				  alert('Logado com sucesso!');window.location.
				  href='perfil2.php'</script>";
            }
        ?>
    </body>
</html>