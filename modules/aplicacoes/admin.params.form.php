<?
$form = new nbrAdminForms('sis_parametros');

$form->AddFieldString('Nome', 'Nome', 100, 3);
$form->AddFieldList('Tipo', 'Tipo', 'TXT=Texto|STR=String|BOL=Lógico|HTM=Html|ARQ=Arquivo', 1);
$form->AddFieldString('Identificador', 'Identificador', 100, 2);

$form->AddFieldText('Valor', 'Valor', 4, 150, null, false);

$form->PrintHTML();
?>