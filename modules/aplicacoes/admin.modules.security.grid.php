<?
$grid = new nbrAdminGrid('sis_modulosecurity', 'Regras de Segurança');

$grid->formFile = 'admin.modules.security.form.php';

$grid->AddColumnTable('Group', 'Grupo de Usuário', 300, 'sis_grupos', 'Name');
$grid->AddColumnBoolean('PermissionView', 'Ver');

$grid->PrintHTML();
?>