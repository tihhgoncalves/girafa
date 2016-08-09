<?
$grid = new nbrAdminGrid('sysAdminGroups', 'Grupos de Usuários');

//Complementos SQL..
$grid->orders = 'Name ASC';

//Arquivos Complementares...
$grid->formFile = 'admin.security.groups.form.php';

//Colunas..
$grid->AddColumnString('Name', 'Nome', 300);

$grid->PrintHTML();
?>