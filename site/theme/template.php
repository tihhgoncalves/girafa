<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= ($page->title . ' - ' . $site->title); ?></title>

    <!-- Carrega jQuery -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Carrega Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Carrega bootstrap.device.debug -->
    <!-- Quando terminar o site comentar as chamas abaixo -->
    <link rel="stylesheet" href="<?= $cms->GetFrontJavaScriptUrl(); ?>bootstrap.device.debug/bootstrap.device.debug.css">
    <script src="<?= $cms->GetFrontJavaScriptUrl(); ?>bootstrap.device.debug/bootstrap.device.debug.js"></script>

    <!-- Banners do Topo -->
    <script src="<?= $cms->GetFrontJavaScriptUrl(); ?>cycle/jquery.cycle.js"></script>
    <script src="<?= $cms->GetFrontJavaScriptUrl(); ?>cycle/responsivo.js"></script>

    <!-- Controle de acesso pelo Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Carrega CSS -->
    <link rel="stylesheet" href="<?= $cms->GetFrontStyleSheetUrl(); ?>master.css">

    <!-- Carrega JS -->
    <script src="<?= $cms->GetFrontJavaScriptUrl(); ?>jquery.dotdotdot.js"></script>
    <script src="<?= $cms->GetFrontJavaScriptUrl(); ?>base.js"></script>


    <?
    //Imprime cabeçalho automatizado do CMS
    $page->printHeader();
    ?>

    <script type="text/javascript">
        /** Variáries Usadas no Site **/
        var site_url  = '<?= $GLOBALS['ROOT_URL'] ?>';
        var link_url  = '<?= $GLOBALS['ROOT_URL'] . $GLOBALS['LINK_PREFIX'] ?>';
        var theme_url = '<?= $cms->GetThemeUrl(); ?>';
        var pagename = '<?= $router->getPage(); ?>';
    </script>
</head>

<body>

<div id="main">

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Cabeçalho do Site</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- CONTEUDO - INICIO -->
    <? include($FRONT_PAGES_PATH . $fileHtml); ?>
    <!-- CONTEUDO - FIM -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Rodapé do Site</strong></p>
                </div>
            </div>
        </div>
    </footer>

</div>
</body>
</html>