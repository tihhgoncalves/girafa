<?
$grid = new nbrAdminGrid('sysModuleSecurity', 'Regras de Segurança');

$grid->formFile = 'admin.modules.security.form.php';

$grid->AddColumnTable('Group', 'Grupo de Usuário', 300, 'sysAdminGroups', 'Name');
$grid->AddColumnBoolean('PermissionView', 'Ver');

$grid->PrintHTML();
?>