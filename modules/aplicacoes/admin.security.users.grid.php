<?
$grid = new nbrAdminGrid('sysAdminUsers', 'Usuários do Sistema');

//Arquivos Complementares..
$grid->formFile = 'admin.security.users.form.php';

//Colunas..
$grid->AddColumnString('Name', 'Nome', 250);
$grid->AddColumnString('Mail', 'E-mail', 200);
$grid->AddColumnBoolean('Developer', 'Desenvolvedor?', 100);
$grid->AddColumnBoolean('Actived', 'Situação', 50);

$grid->PrintHTML();
?>