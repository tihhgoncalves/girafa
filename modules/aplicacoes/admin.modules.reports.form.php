<?
$form = new nbrAdminForms('sysModuleReports');

$form->AddFieldHidden('Published', 'Y');

$form->AddFieldString('Title', 'Titulo', 50, 2);
$form->AddFieldString('File', 'Arquivo Relatório', 100, 2);
$form->AddFieldList('Type', 'Tipo', 'PDF=PDF|XLS=Planilha Excel', 1);
$form->AddFieldString('FileFilters', 'Arquivo Filtro', 100, 2);

$form->PrintHTML();
?>