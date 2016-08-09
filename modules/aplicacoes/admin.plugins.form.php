<?
$form = new nbrAdminForms('sysPlugins');

$form->AddFieldString('Name', 'Nome', 50, 3, null, true, true);
$form->AddFieldString('Path', 'Diretório', 30, 2, null, true, true);
$form->AddFieldString('Version', 'Versão', 10, 1, null, true, true);

$form->PrintHTML();
?>