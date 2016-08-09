<?

//Apaga imagens de cache..
$cache->ClearCache();

$dataSet->SetParam('msgSucess', 'Os arquivos de cache foram excluídos com sucesso');
$hub->BackLevel(2);
header('Location:' . $hub->GetUrl());
?>