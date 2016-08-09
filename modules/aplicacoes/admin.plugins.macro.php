<?
function macroBeforeDelete($tableName, $reg){
  global $PLUGINS_PATH;
  if($reg->Actived == 'Y'){
    returnError(sprintf("Ops! Você não pode excluir um plugin que ainda está instalado. Desinstale o plugin <b> %s </b> antes de exclui-lo", utf8_encode($reg->Name)));
  } else {
    
    $plugin_path = $PLUGINS_PATH . utf8_encode($reg->Path);
    rmdir_recursiva($plugin_path);
  }
    
}
?>