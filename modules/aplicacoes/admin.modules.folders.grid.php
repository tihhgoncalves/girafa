<?
$grid = new nbrAdminGrid('sysModuleFolders', 'Pastas de Módulos do Sitema');

//Arquivos Complementares..
$grid->formFile = 'admin.modules.folders.form.php';

//Complementos de SQL...
$grid->AddControlOrder('Order');

//Colunas...
$grid->AddColumnString('Name', 'Nome', 400);
$grid->AddColumnString('Grouper', 'Agrupador', 350);
$grid->AddColumnTable('Module', 'Módulo', 200, 'sysModules', 'Name');
$grid->AddColumnBoolean('Actived', 'Ativo');

$grid->PrintHTML();
?>