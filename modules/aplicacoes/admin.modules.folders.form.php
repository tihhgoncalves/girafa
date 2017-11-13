<?
$tableName = 'sis_pastas';

$edition = $hub->ExistParam('ID');

$form = new nbrAdminForms($tableName);

$form->AddFieldString('Name', 'Nome', 100, 2, null, true);
$form->AddFieldString('Grouper', 'Agrupador', 50, 2, 'Geral');
$form->AddFieldString('File', 'Nome do Arquivo', 50, 3);
$form->AddFieldBoolean('MultiLanguages', 'Multilinguístico', 1, 'N');
$form->AddFieldHidden('Actived', 'Y');

$form->AddGroup('Contador');
$form->AddDescriptionText('Digite abaixo o SQL que retornará o resultado do contador.');
$form->AddDescriptionText('No SQL, o campo que representará o número do contador deverá ser: TOTAL');
$form->AddFieldText('CounterSQL', 'SQL', 4, 100, null, false);


$form->PrintHTML();

?>