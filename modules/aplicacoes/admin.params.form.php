<?
$form = new nbrAdminForms('sysParams');

$form->AddFieldString('Nome', 'Nome', 100, 2);
$form->AddFieldList('Tipo', 'Tipo', 'TXT=Texto|STR=String|BOL=Lógico|HTM=Html', 1);
$form->AddFieldList('Agrupador', 'Agrupador', 'CMS=Do CMS|SIT=Do Site', 1);
$form->AddFieldString('Identificador', 'Identificador', 15, 2);
$form->AddFieldText('Valor', 'Valor', 3, 150, null, false);

$form->PrintHTML();
?>