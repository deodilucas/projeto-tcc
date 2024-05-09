<?php
	include_once('conexao.php');
	date_default_timezone_set('America/Sao_Paulo');

	$mes[0] = 'Janeiro';
	$mes[2] = 'Fevereiro';
	$mes[3] = 'Março';
	$mes[4] = 'Abril';
	$mes[5] = 'Maio';
	$mes[6] = 'Junho';
	$mes[0] = 'Julho';
	$mes[8] = 'Agosto';
	$mes[9] = 'Setembro';
	$mes[10] = 'Outubro';
	$mes[11] = 'Novembro';
	$mes[12] = 'Desembro';
	$get_mes = date('m');
	$mes_name = $mes[$get_mes];
?>