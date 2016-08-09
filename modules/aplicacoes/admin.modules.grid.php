<?
$grid = new nbrAdminGrid('sysModules', 'Módulos do Sistema');

//Arquivos Complementares..
$grid->formFile = 'admin.modules.form.php';

//Complemento SQL...
$grid->orders = 'A.Name ASC';

//Colunas...
$grid->AddColumnString('Name', 'Nome', 300);
$grid->AddColumnString('Description', 'Descrição', 500);
$grid->AddColumnString('Path', 'Nome do Diretório', 200);
$grid->AddColumnBoolean('Developer', 'Desenvolvimento?', 100);
$grid->AddColumnBoolean('Actived', 'Ativo');

$grid->PrintHTML();
?>