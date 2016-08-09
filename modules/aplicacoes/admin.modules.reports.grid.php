<?
$grid = new nbrAdminGrid('sysModuleReports', 'Relatórios');

$grid->formFile = 'admin.modules.reports.form.php';

$grid->orders = 'Title ASC';

$grid->AddColumnString('Title', 'Titulo', 300);
$grid->AddColumnString('File', 'Arquivo', 200);
$grid->AddColumnList('Type', 'Tipo de Arquivo', 150, 'PDF=Documento em PDF|XLS=Planilha do Excel', 'center');
$grid->AddColumnBoolean('Published', 'Publicado', 45);

$grid->PrintHTML();
?>