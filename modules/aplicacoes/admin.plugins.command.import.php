<h1>Importar Plugin</h1>


<div id="boxForm">
<?
$hub->SetParam('_script', $moduleObj->path . 'admin.plugins.command.import.post.php');
?>
  <form action="<?= $hub->GetUrl(); ?>" id="formulario" name="formulario" enctype="multipart/form-data" method="post">
  
    <div class="description">
    Selecione abaixo o arquivo .zip que contém o plugin.
    </div>

    <div class="field string twoColumn required disabled">
      <label class="legend">Pacote</label>
        <input type="file" id="pacote" name="pacote" style="height: 23px;margin-top:3px"  class="required">
    </div>
    <div style="padding-left: 5px; padding-top: 85px;">
    <input type="submit" name="enviar" id="enviar" class="btnGreen" value="Enviar">
    </div>

  </form>
</div>