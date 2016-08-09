<?
$form = new nbrAdminForms('sysLogs');

$form->AddGroup('Identificação do Usuário');
$form->AddFieldString('UserName', 'Nome de Usuário', 100, 2, null, true, true);
$form->AddFieldString('UserMail', 'E-mail do Usuário', 100, 2, null, true, true);

$form->AddGroup('Ação do Usuário');
$form->AddFieldList('Action', 'Ação', 'LOG=Login|NEW=Inseriu novo Registro|EDT=Editou um Registro|DEL=Excluiu um Registro|ORD=Alterou Ordem de Registros|CLN=Limpou Histórico', 2, null, true, true);
$form->AddFieldText('Description', 'Descrição', 3, 200, null, true, true);

$form->AddGroup('Outras Informações do Usuário');
$form->AddFieldString('IP', 'IP', 16, 1, null, true, true);
$form->AddFieldList('OS', 'Sist. Operacional', 'ADN=Andróid|BKB=BlackBerry|IPH=iPhone|PLM=Palm|LNX=linux|MCT=Macintosh|WIN=Windows|000=Brower não identificado', 1, null, true, true);
$form->AddFieldList('Browser', 'Navegador', 'IE6=Internet Explorer 6|IE7=Internet Explorer 7|IE8=Internet Explorer 8|CHR=Chrome|FFX=Firefox|OPR=Opera|SAF=Safari|000=Não Identificado', 1, null, true, true);

$form->PrintHTML();
?>