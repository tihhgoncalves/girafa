<?

/**
 * Parâmetros
 */

$form = new nbrAdminForms('sysTableFields');

if($form->Editing()){
  $reg = LoadRecord('sysTableFields', $hub->GetParam('ID'));
} else {
  $reg = null;  
}

$form->AddFieldString('Name', 'Nome do Campo', 50, 2, null, true, $form->Editing());
$form->AddFieldList('Type', 'Tipo', 'STR=String|INT=Inteiro|NUM=Numero Decimal|BOL=Lógico|TAB=Tabela|LST=Lista|DTA=Data|DTT=Data e Hora|TXT=Texto|IMG=Imagem|FIL=Arquivo|PSW=Senha', 1, null, true, $form->Editing());

$form->AddGroup('Complemento do campo String:', 'legendaString');
$form->AddDescriptionText('Prencha o campo Tamanho com o número de caracteres que deseja que seu campo tenha.', 'descricaoString');
$form->AddFieldInteger('Length', 'Tamanho', 1, null, false, ($reg != null && $reg->Type != 'STR'));

$form->AddGroup('Complemento do campo Lista:', 'legendaLista');
$form->AddDescriptionText('Prencha o campo Opções.<br>Ex.: EST=Estado|CID=Cidade|BAR=Bairro|FIL=Arquivo', 'descricaoLista');
$form->AddFieldString('ListValues', 'Opções', 500, 3, null, false, ($reg != null && $reg->Type != 'LST'));

$form->AddGroup('Complemento do campo Tabela:', 'legendaTabela');
$form->AddDescriptionText('Informe abaixo a tabela a qual este campo irá linkar.', 'descricaoTabela');
$form->AddFieldLkpList('TableLink', 'Tabela Link', 'sysTables', 'Name', null, 2, false, $form->Editing());

if(!$form->Editing()){
  $form->AddFieldHidden('Order', '9999');
}
$form->PrintHTML();
?>