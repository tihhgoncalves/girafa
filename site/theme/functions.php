<?php
function NumeroComZero($num){

	$zeros = '00000';

	$num = strval($num);

	return substr($zeros, 0, (strlen($zeros) - strlen($num))) . $num;

}

function HistoricoDePedido($id, $msg){
	global $db;

	$reg  = "\r\n";
	$reg .= '--------------------------------------';
	$reg .= "\r\n";
	$reg .= date('d/m/Y H:i');
	$reg .= "\r\n";
	$reg .= ' - ' . $msg;

	$sql = "UPDATE Pedidos SET Historico = CONCAT(Historico, '$reg') WHERE ID = " . $id;

	$db->Execute($sql);

}


function base64_url_encode($input) {
	return strtr(base64_encode($input), '+/=', '-_,');
}

function base64_url_decode($input) {
	return base64_decode(strtr($input, '-_,', '+/='));
}
?>