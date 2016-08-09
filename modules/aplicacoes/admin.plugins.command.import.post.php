<?
$arquivo_nomeTMP = $_FILES['pacote']['tmp_name'];
$arquivo_nome    = $_FILES['pacote']['name'];
$diretorio_nome = substr($arquivo_nome, 0, -4);

//nome temp...
$d = explode('\\', $arquivo_nomeTMP);
$d2 = array_pop($d);
$a = explode('.', $d2);
$TMP = strtolower($a[0]);
$TMPfull = $cms->GetTempPath() . $TMP . '/';

//Cria diretório (temporário) fisicamente...
mkdir($TMPfull, 0777, true);

//Extrai...
$zip = zip_open($arquivo_nomeTMP);

if(is_resource($zip)){
  
  while ($zip_entry = zip_read($zip)) {
    
    $caminho = $TMPfull;
    
    $arquivoFull = zip_entry_name($zip_entry);
    $arquivo = str_replace('\\', '/', $arquivoFull);
    
    if(substr($arquivoFull, -1) == '/'){
      
      //diretório
      mkdir($TMPfull . $arquivoFull);
    } else {
      
      //aquivo
      $fp = fopen($TMPfull . $arquivoFull , "w");
      
      
      if (zip_entry_open($zip, $zip_entry, "r")) {
        $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)); 
        fwrite($fp,"$buf");
  
        zip_entry_close($zip_entry);     
        
        fclose($fp); 
      }       
    }
    
  }
  zip_close($zip); 
}

//carrega configurações do plugin...
include($TMPfull . $diretorio_nome . '/' . 'config.php');


$dir = $PLUGINS_PATH . $plugin->path;

//verifica se diretório já existe...
if(is_dir($dir)){
  $dataSet->SetParam('msgError', 'Ops! Já existe plugin que ocupa o mesmo diretório que este que você está tentando instalar.');
  $hub->BackLevel(3);
  header('LOCATION:' . $hub->GetUrl());
  exit;
}


//Move plugin do diretório Temporario para o Oficial
rename($TMPfull . $diretorio_nome . '/', $dir);

///ADICIONA NA TABELA...
$post = new nbrTablePost();
$post->table  = 'sysPlugins';
$post->AddFieldString('Name', $plugin->name);
$post->AddFieldString('Description', $plugin->description);
$post->AddFieldString('URL', $plugin->url);
$post->AddFieldString('Path', $plugin->path);
$post->AddFieldString('Version', $plugin->version);
$post->Execute();

//link...
$dataSet->SetParam('msgSucess',"O plugin '" . $plugin->name . "' foi importado com sucesso.");
$hub->BackLevel(3);
header('LOCATION:' . $hub->GetUrl());
?>