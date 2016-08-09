<?
$arquivo = $db->database . '_' . date('d-m-Y_H-i') . ".sql";
$arquivoFull = $cms->GetTempPath() . $arquivo;

$command = "mysqldump --opt --skip-extended-insert --complete-insert --host=".$db->host." --user=".$db->user." --password=".$db->pass." " .$db->database." > " . $cms->GetTempPath() . $db->database.".sql";
exec($command, $output, $error_code);


if($error_code == 0){
	//Download..
	header('Content-Disposition: attachment; filename=' . $arquivo);   
	header('Content-Type: application/force-download');
	header('Content-Type: application/octet-stream');
	header('Content-Type: application/download');
	header('Content-Description: File Transfer');            
	
	die(file_get_contents($arquivoFull));
	
} else {
	//Volta com msg de erro
	$dataSet->SetParam('msgError', 'Ocorreu um erro ao tentar exportar backup do banco de dados.');
	$hub->BackLevel(2);
	header('LOCATION:' . $hub->GetUrl());
	
}
?>