<?
$grid = new nbrAdminGrid('sysAdminGroups', 'Grupos de Usuários');
$grid->wheres = 'ID <> 1'; //não mostra Administrador

//Complementos SQL..
$grid->orders = 'Name ASC';

//Arquivos Complementares...
$grid->formFile = 'admin.grupos.form.php';

//Colunas..
$grid->AddColumnString('Name', 'Nome', 300);

$grid->PrintHTML();
?>