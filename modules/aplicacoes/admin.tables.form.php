<?
/**
 * Parâmetros
 */
$form = new nbrAdminForms('sysTables');

$form->AddFieldString('Name', 'Nome da Tabela', 50, 2, null, true, $form->Editing());
$form->AddFieldBoolean('IsSystem', 'É do Sistema?', 1, 'N');
$form->AddFieldString('Comment', 'Comentário', 60, 3, null);

/**
 * Links
 */
  
$form->AddCollections('Campos', 'admin.tables.fields.grid.php', 'sysTableFields', 'Table');

$form->PrintHTML();

?>