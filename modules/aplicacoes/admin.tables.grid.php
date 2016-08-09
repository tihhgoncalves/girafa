<?
$grid = new nbrAdminGrid('sysTables', 'Tabelas');

//Filtros...
$grid->AddFilter("A.IsSystem = 'Y'", 'Somente do Sistema');
$grid->AddFilter("A.IsSystem <> 'Y'", 'Tabelas que não são do Sistema.', true);

//Comandos..
$hub->SetParam('_script', $moduleObj->path . 'admin.tables.command.constrains.php');
$grid->AddCommand('Re-criar Constrains', $hub->GetUrl(), 'Excluir e recriar os constrais do Sistema', 'Tem certeza que deseja EXCLUIR TODOS OS CONTRAINS e recriá-los?');

$hub->SetParam('_script', $moduleObj->path . 'admin.tables.command.dumpdb.php');
$grid->AddCommand('Backup do DB', $hub->GetUrl(), 'Faça um Dump do DB');

$hub->SetParam('_script', $moduleObj->path . 'admin.tables.command.deleteCache.php');
$grid->AddCommand('Limpar Cache', $hub->GetUrl(), 'Limpar arquivos de cache', 'Tem certeza que deseja EXCLUIR os arquivos de cache do CMS?');

//Complementos de SQL...
$grid->orders = 'A.Name ASC';

//Arquivos Complementares..
$grid->formFile  = 'admin.tables.form.php';
$grid->macroFile = 'admin.tables.macro.php';

//Colunas...
$grid->AddColumnString('Name', 'Nome', 230);
$grid->AddColumnString('Comment','Comentário', 500);
$grid->AddColumnCustom('REGISTROS', 'Qtd Reg.', 100, 'center');
$grid->AddColumnCustom('CAMPOS', 'Qtd Campos', 100, 'center');
$grid->AddColumnBoolean('IsSystem','Do Sistema?', 70);

$grid->PrintHTML();

//Macro...
function macroGridValues($field , $value, $record){
  global $db;
  
  if($field == 'REGISTROS'){
    
    $sql  = 'SELECT COUNT(ID) TOTAL FROM `' . $record->Name . '`';
    $res = $db->LoadObjects($sql);
    return intval($res[0]->TOTAL);
    
  }

  if($field == 'CAMPOS'){
    
    $sql  = 'SELECT COUNT(ID) TOTAL FROM sysTableFields';
    $sql .= " WHERE  `Table` = " . $record->ID;
    $res = $db->LoadObjects($sql);
    return intval($res[0]->TOTAL);
    
  }
}
?>