<?
//Apaga Todos os Registros (menos o que diz "Limpeza de Histórico" (CLN)

$sql  = 'DELETE FROM sysLogs';
$sql .= " WHERE Action <> 'CLN'";

try{
  $db->Execute($sql);
} catch (Exception $e) {
  $x = $db->errorMsg;
  returnError('Ocorreu um erro ao tentar excluir constrains.', $db->errorMsg);
}


//Cria novo registro de Histórico informando a limpeza..
nbrLogs::AddAction('CLN', 'Limpou Histórico de Usuário');

//Volta pra página anterior com mensagem...
$dataSet->SetParam('msgSucess', 'O Histórico de Usuário foi limpo com sucesso.');
$hub->BackLevel(2);
header('Location:' . $hub->GetUrl());


?>