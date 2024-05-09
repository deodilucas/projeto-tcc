<?php
	include_once('conexao.php');
	date_default_timezone_set('America/Sao_Paulo');

	//saldo total
	$mes_ini = date('Y-m-01');
	$mes_fim = date('Y-m-31');

	$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário')";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$des_t = $array['SUM(val_reg)'];

	$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg BETWEEN '$mes_ini' AND '$mes_fim'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$gan_t = $array['SUM(val_reg)'];

	$des_t = $des_t+0;
	$gan_t = $gan_t+0;
	$saldo_t = $gan_t-$des_t;

	//saldo do mes

	$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND cat_reg IS NOT NULL AND cat_reg NOT IN ('Salário')";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$des = $array['SUM(val_reg)'];

	$query_select = "SELECT SUM(val_reg) FROM registro WHERE fk_user = '$id' AND (cat_reg IS NULL or cat_reg = 'Salário') AND dat_reg BETWEEN '$mes_ini' AND '$mes_fim'";
	$select = mysqli_query($conexao,$query_select);
	$array = mysqli_fetch_array($select);
	$gan = $array['SUM(val_reg)'];

	$gan = $gan+0;
	$des = $des+0;
	$saldo = $gan - $des;

?>