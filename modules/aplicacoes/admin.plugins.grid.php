<?
$grid = new nbrAdminGrid('sysPlugins', 'Plugins');
$grid->macroFile = 'admin.plugins.macro.php';

//Segurança...
$grid->securityNew = false;
$grid->securityDelete = true;

//Comandos..

$hub->LoadParamsBack();
$hub->SetParam('_page', $moduleObj->path . 'admin.plugins.command.import.php');
$grid->AddCommand('Importar Plugin', $hub->GetUrl(), 'Importar plugin');

$grid->formFile = 'admin.plugins.form.php';
$grid->macroFile = 'admin.plugins.macro.php';

$grid->orders = 'Name ASC';

$grid->AddColumnString('Name', 'Nome', 200);
$grid->AddColumnString('Description', 'Descrição', 250);
$grid->AddColumnString('Version', 'Versão', 50, 'center');
//$grid->AddColumnBoolean('Actived', 'Instalado', 75);
$grid->AddColumnCustom('INSTALAR', 'Instalação', 100, 'center');
$grid->AddColumnHidden('Actived');

$grid->PrintHTML();

//Macro...
function macroGridValues($field , $value, $record){
  global $db, $MODULES_URL, $MODULES_PATH, $hub;
  
  if($field == 'INSTALAR'){
    
    $instalado = ($record->Actived == 'Y');
    
    if(!$instalado){
      $hub->SetParam('_script', $MODULES_PATH . 'aplicacoes/admin.plugins.install.php');
      $hub->SetParam('action', 'install');
      $hub->SetParam('pluginID', $record->ID);
      $html  = '<a href="' . $hub->GetUrl() . '" title="Clique aqui para instalar este plugin." >';
      $html .= '<img src="' . $MODULES_URL . '/aplicacoes/admin.plugins.installoff.png">';
      $html .= '</a>';
    } else {
      $hub->SetParam('_script', $MODULES_PATH . 'aplicacoes/admin.plugins.install.php');
      $hub->SetParam('action', 'uninstall');      
      $hub->SetParam('pluginID', $record->ID);      
      $html  = '<a href="javascript:confirmLink(\'Tem certeza que deseja DESINSTALAR este plugin?<br>Isso poderá resultar na exclusão de dados referente a ele.\', \'Tem certeza?\', \'' . $hub->GetUrl() . '\');" title="Este plugin JÁ ESTÁ INSTALADO. Clique aqui para desinstalá-lo.">';
      $html .= '<img src="' . $MODULES_URL . '/aplicacoes/admin.plugins.install.png">';
      $html .= '</a>';      
    }
    return $html;
  }
}
?>