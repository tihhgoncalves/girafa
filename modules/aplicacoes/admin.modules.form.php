<?
$tableName = 'sysModules';
$form = new nbrAdminForms($tableName);

$form->AddFieldString('Name', 'Nome ', 30, 2, null, true);
$form->AddFieldString('Path', 'Diretório', 30, 2, null, true);
$form->AddFieldString('Description', 'Descrição', 50, 4);
$form->AddFieldHidden('Actived', 'Y');

$form->AddCollections('Pastas', 'admin.modules.folders.grid.php', 'sysModuleFolders', 'Module');
$form->AddCollections('Relatórios', 'admin.modules.reports.grid.php', 'sysModuleReports', 'Module');

//Lookup Multiselect..
$title = 'Grupo de Segurança';
$description  = 'Informe abaixo o(s) Grupo(s) a qual este Módulo se relaciona.';
$description .= '<br>';
$description .= 'O(s) Grupo(s) relacionado(s) a este Módulo controlará as sessões do CMS exibidas.';
$form->AddLkpMultselect('SEGURANCA', $title, $description, 'sysModuleSecurityGroups', 'Module', 'sysAdminGroups', 'Group', 'Name', null, null, 3, false);

//Ícone
$form->AddGroup('Ícone');
$form->AddDescriptionText('Selecione um ícone para representar este módulo.');
$form->AddFieldCustom('Icon');

//Idiomas..
$form->AddLkpMultselect('IDIOMAS', 'Idiomas', 'O(s) idioma(s) que mostrará(rão) o módulo', 'sysModulesLanguages', 'Modulo', 'sysLanguages', 'Idioma', 'Nome', null, null, 3, false);

$form->PrintHTML();


function macroFormAfterField($fieldName, $record){
  global $cms, $moduleObj;
  
  switch ($fieldName){
    
    case 'Icon':

      $html  = '<div id="icones" class="field col4">' . "\r\n";
      $html .= '<input name="Icon" id="Icon" type="hidden" value="' . $record->Icon . '">' . "\r\n";
      
      $icons = array('fa-cutlery', 'fa-car', 'fa-microchip', 'fa-archive', 'fa-sliders', 'fa-users');

      foreach($icons as $icon) {
        $html .= '<div class="' . (($record->Icon == $icon) ? 'icone iconeSelected' : 'icone') . '" arquivoNome="' . $icon . '">' . "\r\n";
        $html .= '<i class="fa ' . $icon . '" aria-hidden="true"></i>' . "\r\n";
        $html .= '</div>' . "\r\n";
      }

      $html .= '</div>' . "\r\n";

      return $html;
    
  }

}
?>