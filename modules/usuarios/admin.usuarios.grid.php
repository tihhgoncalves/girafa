<?
$grid = new nbrAdminGrid('sysAdminUsers', 'Usuários do Sistema');

$grid->wheres = 'A .`Group` <> 1 OR A.`GROUP` IS NULL';

//Arquivos Complementares..
$grid->formFile = 'admin.usuarios.form.php';

//Colunas..
$grid->AddColumnString('Name', 'Nome', 250);
$grid->AddColumnString('Mail', 'E-mail', 200);
$grid->AddColumnBoolean('Developer', 'Desenvolvedor?', 100);
$grid->AddColumnBoolean('Actived', 'Situação', 50);

$grid->PrintHTML();
?>