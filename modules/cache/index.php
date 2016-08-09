<h1>Controle de Cache</h1>

<?

# MENSAGENS DE RETORNO

if($dataSet->ExistParam('msgSucess')){
    $msg = $dataSet->GetParam('msgSucess');
    $html .= '<div id="msg_sucesso">' . $msg . "\r\n";
    $html .= '<img src="' . $cms->GetAdminImageUrl() . 'msg_sucesso_close.png" width="12" heigth="12" id="msg_sucesso_close" class="alphaOut">' . "\r\n";
    $html .= '</div>' . "\r\n";
    $dataSet->DeleteParam('msgSucess');
    echo($html);
}
?>

<p style="margin: 10px 0; line-height: 20px;">Clique no botão abaixo para limpar todos os arquivos temporários (de cache) gerados para o site.<br>
Fique tranquilo! Ao limpar esses arquivos eles serão novamente gerados na próxima requesição do site.</p>

<?
$hub->SetParam('_script', $moduleObj->path . 'exec.limpar.php');
?>
<a href="<?= $hub->GetUrl(); ?>"><button class="btn green back" type="button"  icon="ui-icon-trash">Limpar o cache</button></a>