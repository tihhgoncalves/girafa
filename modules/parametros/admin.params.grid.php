<?
$grid = new nbrAdminGrid('sis_parametros', 'Cadastro de Parâmetros');
$grid->formFile = 'admin.params.form.php';
$grid->securityDelete = false;
$grid->securityNew = false;

$grid->orders = 'Nome ASC';

$grid->AddColumnString('Nome', 'Nome', 250);
$grid->AddColumnList('Tipo', 'Tipo', 150, 'STR=String|TXT=Texto|BOL=Lógico|HTM=Html|ARQ=Arquivo');

$grid->PrintHTML();
?>