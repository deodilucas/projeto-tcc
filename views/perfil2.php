<?php
	include_once('conexao.php');
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	$_SESSION["email"];

	// SELECIONAR DADOS DO USUARIO
	$query_select = "SELECT * FROM usuario WHERE email = '$_SESSION[email]'";
	$select = mysqli_query($conexao, $query_select);
	$array = mysqli_fetch_assoc($select);
	$nome = $array['nome'];
	$id = $array['id_user'];
	$pic_perfil = $array['img'];
	$dat= date('Y');
	$dat = intval($dat);
	$nasc = $array['nasc'];
	$data = intval($nasc);
	$idd = $dat-$data;
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../ativos/icons/logov3.ico" />
	<title>Perfil <?php echo $nome; ?></title>
	<style type="text/css">
		body {
			color: #232433;
			margin: 0%;
			font-family: Rubik;
			background-color: #F9F9F9;
		}
		.menu {
			height: 7.5vh;
			width: 100%;
		}
		nav {
			font-family: Poppins;
			padding-left: 10%;
		    margin:0px;
		    list-style:none;
		    font-weight: 600;
		    color: #444444;
		}
		ul {
			padding-left: 0px;
		}
		ul li {
			display: inline;
		}
		nav ul li a {
		    padding: 2px 10px;
		    display: inline-block;
		    color: #444444;
		    text-decoration: none;
		}
		nav ul li a:hover {
		    padding: 2px 10px;
		    display: inline-block;
		    color: #090A0D;
		    text-decoration: none;
		}
		.space {
			height: 90vh;
			width: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.content {
			background-color: white;
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			border-radius: 5px;
			height: 50%;
			width: 70%;
			display: grid;
			grid-template-columns: 40% 30% 30%;
			grid-template-rows: auto;
		}
		.box-a {
			display: flex;
			align-items: center;
			justify-content: center;
			grid-column: 1;
		}
		.box-b {
			grid-column: 2;
		}
		.pic-perfil {
			height: 200px;
			width: 200px;
			border-radius: 50%;
			background-image: url(imagens/<?php echo $pic_perfil; ?>);
			background-size: cover;
		}
		h1 {
			font-family: Poppins;
		}
		h2 {
			font-family: Rubik;
		}
		span {
			font-size: 1.2em;
			font-weight: 600;
		}
		#but {
			width: 40%;
			border-radius: 5px;
			font-family: Poppins;
			background-color: white;
			color: #232433;
			height: 30px;
			font-weight: 600;
			border: none;
			padding: 2px;
			cursor: pointer;
			margin: 10px 0 0 0;
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
		}
		a {
			text-decoration: none;
			color: #bababa;

		}
		a:hover{
			color: #232433;
		}
	</style>
</head>
<body>
	<div class="menu">
		<nav>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="Relatorio.php">Relatorio</a></li>
				<li><a href="planejamento.php">Planejamento</a></li>
				<li><a href="artigos.php">Artigos</a></li>		
			</ul>
		</nav>
	</div>
	<div class="space">
		<div class="content">
			<div class="box-a">
				<a style="cursor: pointer;" onClick="window.open('forms/form-img.php', 'Envio','width=350,height=400,left=100,top=50')">
				<div class="pic-perfil"></div></a>
			</div>
			<div class="box-b">
				<h1>Bio</h1>
				Nome<br><span><?php echo $nome; ?></span><br>
				Idade<br><span class="idade"><?php echo $idd.' anos'; ?></span><br>
				E-mail<br><span class="idade"><?php echo $_SESSION['email']; ?></span><br><br>
				<a style="cursor: pointer;" href="logout.php">Sair</a>
			</div>
			<div class="box c">
				<h1>Emprego</h1>
				<?php
				$query_select = "SELECT * FROM emprego WHERE fk_user = '$id'";
				$select = mysqli_query($conexao, $query_select);
				$array = mysqli_fetch_assoc($select);
				$cont = mysqli_num_rows($select);
				$cargo = $array['cargo'];
				$empresa = $array['empresa'];
				$salario = $array['salario'];
				$pagamento = $array ['pagamento'];
				$id_emp  = $array['id_emp'];

				if ($cont == 0) {
					echo "<p>Nenhum emprego registrado!</p><br>"?>
					<a style="cursor: pointer;" onClick="window.open('forms/form-emprego.php', 'Envio','width=350,height=500,left=100,top=50')">Adicionar</a>
				<?php ;} else {
				?>
				Cargo<br><span><?php echo $cargo; ?></span><br>
				Empresa<br><span class="idade"><?php echo $empresa; ?></span><br>
				Salario<br><span class="idade"><?php echo 'R$ '.$salario; ?></span><br><br>
				<a style="cursor: pointer; padding-right: 10px;" onClick="window.open('edit/edit-emprego.php', 'Envio','width=350,height=500,left=100,top=50')">Editar</a>
				<a href="delete/delete-emprego.php">Excluir</a>
				<?php }

				$data_hj = date('Y-m-d');

				if ($data_hj == $pagamento){
					if ($salario == "" || $salario == null || $salario == 0){
					}
					else{
						$query = "INSERT INTO registro (dat_reg,fk_user,val_reg, cat_reg) VALUES ('$data_hj','$id','$salario', 'Salário')";
						$insert = mysqli_query($conexao,$query);
						$pagamento = new DateTime($pagamento);
						$pagamento = new DateTime('+1 month');
						$pagamento = $pagamento->format('Y-m-d');
						$query = "UPDATE emprego SET pagamento = '$pagamento' WHERE id_emp = '$id_emp'";
						$update = mysqli_query($conexao,$query);
					}
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>