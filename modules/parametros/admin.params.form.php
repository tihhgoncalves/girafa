<?
$form = new nbrAdminForms('sis_parametros');

$form->AddFieldString('Nome', 'Nome', 100, 2, null, false, true);

switch ($form->record->Tipo) {
	case 'STR':
		$form->AddFieldString('Valor', 'Valor', 150, 3);
		break;

	case 'TXT':
		$form->AddFieldText('Valor', 'Valor', 3, 150);
		break;
		
	case 'HTM':
		$form->AddFieldHtml('Valor', 'Valor', 350);
		break;

	case 'BOL':
		$form->AddFieldBoolean('Valor', 'Valor', 1);
		break;

	case 'ARQ':
		$form->AddFieldFile('Valor', 'Valor');
		break;
}	

$form->PrintHTML();
?>