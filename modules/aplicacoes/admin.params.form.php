<?
$form = new nbrAdminForms('sysParams');

$form->AddFieldString('Nome', 'Nome', 100, 3);
$form->AddFieldList('Tipo', 'Tipo', 'TXT=Texto|STR=String|BOL=Lógico|HTM=Html', 1);
$form->AddFieldString('Identificador', 'Identificador', 15, 2);

$form->AddFieldText('Valor', 'Valor', 4, 150, null, false);

$form->PrintHTML();
?>