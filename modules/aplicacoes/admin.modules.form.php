<?
$tableName = 'sysModules';
$form = new nbrAdminForms($tableName);

$form->AddFieldString('Name', 'Nome ', 30, 2, null, true);
$form->AddFieldString('Path', 'Diretório', 30, 1, null, true);
$form->AddFieldString('Description', 'Descrição', 50, 3);
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
$form->AddFieldCustom('Icon', 'Ícone', 3);
$form->AddDescriptionText('Obs.: Os ícones deverão conter a dimensão de 60x50px e devem estar no diretório ..\cms\icons.');

//Idiomas..
$form->AddLkpMultselect('IDIOMAS', 'Idiomas', 'O(s) idioma(s) que mostrará(rão) o módulo', 'sysModulesLanguages', 'Modulo', 'sysLanguages', 'Idioma', 'Nome', null, null, 3, false);

$form->PrintHTML();


function macroFromFields($fieldName, $record, $legend, $length, $columns, $valueDefault, $required, $readOnly, $height, $options, $required_str, $fileType, $fileTypeDescritio){
  global $cms, $moduleObj;
  
  switch ($fieldName){
    
    case 'Icon':

      switch ($columns) {
      	case 1: $columnsStr = 'oneColumn';break;
      	case 2: $columnsStr = 'twoColumn';break;
      	case 3: $columnsStr = 'threeColumn';break;
      }      

      $html .= '<div id="icones" class="field ' . $columnsStr . '">' . "\r\n";
      $html .= '<input name="Icon" id="Icon" type="hidden" value="' . $record->Icon . '">' . "\r\n";
      
      $path = $cms->GetRootPath() . 'bower_components/girafaCMS/icons/';
      if ($dh = opendir($path)) {
        while (($file = readdir($dh)) !== false) {
          
          if($file != '.' && $file != '..' && $file != '.svn'){
            
           $html .= '<div class="' . (($record->Icon == $file)?'iconeSelected':'icone') . '" arquivoNome="' . $file . '">' . "\r\n";
           $html .= '<img src="' . $cms->GetRootUrl() . 'bower_components/girafaCMS/icons/' . $file . '">' . "\r\n";
           $html .= '</div>' . "\r\n";           
           
          }
        }
        closedir($dh);
      }    
      
      $html .= '</div>' . "\r\n";      
      return $html;
    
  }

}
?>