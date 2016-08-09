<?
$grid = new nbrAdminGrid('sysParams', 'Cadastro de Parâmetros');
$grid->formFile = 'admin.params.form.php';

$grid->orders = 'Nome ASC';

$grid->AddColumnString('Identificador', 'Identificador', 150);
$grid->AddColumnString('Nome', 'Nome', 250);
$grid->AddColumnList('Tipo', 'Tipo', 150, 'STR=String|TXT=Texto|BOL=Lógico|HTM=Html');
$grid->AddColumnList('Agrupador', 'Agrupador', 100, 'CMS=Do CMS|SIT=Do Site');

$grid->PrintHTML();
?>