<?
global $PLUGINS_PATH;

$action = $hub->GetParam('action')  ;
$pluginID = $hub->GetParam('pluginID');

$reg = LoadRecord('sysPlugins', $pluginID);

//carrega configurações do plugin...
include($PLUGINS_PATH . $reg->Path . '/config.php');

if($action == 'install'){

  //instala tabelas...
  foreach($plg_tables as $plg_table){
    $plg_table->CreateTable();
  }

  //chama arquivo de instalação do plugin...
   include($PLUGINS_PATH . $reg->Path . '/install.php');
} else { //Desintalar...

  //desintala tabelas...
  foreach($plg_tables as $plg_table){
    $plg_table->DropTable();
  }

  //chama arquivo de instalação do plugin...
  include($PLUGINS_PATH . $reg->Path . '/uninstall.php');
}

//muda plugin como ativo!
$post = new nbrTablePost();
$post->table = 'sysPlugins';
$post->id = $pluginID;

if($action == 'install'){
  $post->AddFieldBoolean('Actived', true);
  
  $dataSet->SetParam('msgSucess', 'O plugin foi instalado com sucesso');
} else {
  $post->AddFieldBoolean('Actived', false);
  $dataSet->SetParam('msgSucess', 'O plugin foi desintalado com sucesso');
}

$post->Execute();

$hub->BackLevel(2);
header('LOCATION: ' . $hub->GetUrl());
?>