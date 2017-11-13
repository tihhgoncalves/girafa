<?
$form = new nbrAdminForms('sis_usuarios');

//Campos..
$form->AddFieldString('Name', 'Nome', 100, 2);
$form->AddFieldString('Mail', 'E-mail', 50, 2);
$form->AddFieldBoolean('Actived', 'Ativo', 1, 'Y');

$form->AddGroup('Segurança');
$form->AddDescriptionText('Abaixo preencha as informações de segurança e acesso ao sistema.');
$form->AddFieldPassword('Password', 'Senha', 20);

$title = 'Grupo de Segurança';
$description  = 'Informe abaixo o(s) Grupo(s) a qual este Usuário se relaciona.';
$description .= '<br>';
$description .= 'O(s) Grupo(s) relacionado(s) a este Usuário controlará as sessões do CMS exibidas.';
$form->AddLkpMultselect('GRUPOS', $title, $description, 'sis_usuarios_grupos', 'User', 'sis_grupos', 'Group', 'Name', null, null);

if($form->Editing()){
  $hub->SetParam('_page',  $moduleObj->path . 'admin.security.logs.grid.php');
  $hub->SetParam('_title',  'Ações do Usuário');
  $hub->SetParam('_description',  'Ações do Usuário');
  $hub->SetParam('_where', "UserMail = '" . $form->record->Mail . "'");
  $hub->SetParam('_moduleID', $moduleObj->ID);
  $hub->SetParam('_folderID', $folderObj->ID);
  
  $form->AddLink('Histórico de Ações', $hub->GetUrl());
}
$form->PrintHTML();
?>