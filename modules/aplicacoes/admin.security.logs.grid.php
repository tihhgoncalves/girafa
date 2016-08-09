<?
$grid = new nbrAdminGrid('sysLogs', 'Histórico de Ações');

//Permissões
$grid->securityDelete = false;
$grid->securityEdit   = true;
$grid->securityNew    = false;

//Comandos..
$hub->SetParam('_script', $moduleObj->path . 'admin.security.command.clean.php');
$grid->AddCommand('Limpar Registros de Todos os Usuários', $hub->GetUrl(), 'Exclue todos os registros de Histórico de Usuário', 'Tem certeza que deseja EXCLUIR TODOS os registros de Histórico de Usuário (ATENÇÃO que é de todos os usuários)?');


//Arquivos complementares...
$grid->formFile = 'admin.security.logs.form.php';
$grid->macroFile = 'admin.security.logs.macro.php';

//Ordenador
$grid->orders = 'DateTime DESC';

//Campos...
$grid->AddColumnString('UserName', 'Nome do Usuário', 150);
$grid->AddColumnString('UserMail', 'E-mail do Usuário', 180);
$grid->AddColumnDateTime('DateTime', 'Data/Hora', 130);
$grid->AddColumnList('Action', 'Ação', 150, 'LOG=Login|NEW=Inseriu novo Registro|EDT=Editou um Registro|DEL=Excluiu um Registro|ORD=Alterou Ordem de Registros|CLN=Limpou Histórico');
$grid->AddColumnList('OS', 'Sistema Operacional', 125, 'ADN=Andróid|BKB=BlackBerry|IPH=iPhone|PLM=Palm|LNX=linux|MCT=Macintosh|WIN=Windows|000=Brower não identificado');
$grid->AddColumnList('Browser', 'Navegador', 135, 'IE6=Internet Explorer 6|IE7=Internet Explorer 7|IE8=Internet Explorer 8|CHR=Chrome|FFX=Firefox|OPR=Opera|SAF=Safari|000=Não Identificado');

//Executor
$grid->PrintHTML();
?>