<?
$form = new nbrAdminForms('sysModuleSecurity');

$form->AddFieldLkpList('Group', 'Grupo de Usuário', 'sysAdminGroups', 'Name', '', 2);

$form->AddGroup('Permissões');
$form->AddDescriptionText('Abaixo relacione as permissões desta módulo para este grupo de usuários');

$form->AddFieldBoolean('PermissionView', 'Ver', 1, 'Y');

$form->PrintHTML();
?>