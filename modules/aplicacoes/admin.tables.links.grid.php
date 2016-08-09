<?
$grid = new nbrAdminGrid('sysTableConstrains', 'Links entre Tabelas');

//Arquivos Complementares..
$grid->formFile = 'admin.tables.links.form.php';

//Segurança..
$grid->securityDelete = false;
$grid->securityEdit = false;
$grid->securityNew = false;

//Colunas..
$grid->AddFieldOrder('A.Name ASC');
$grid->AddColumnString('Name', 'Nome', 300);
$grid->AddColumnTable('FromTable', 'Tabela', 250, 'sysTables', 'Name');
$grid->AddColumnTable('FromField', 'Campo', 250, 'sysTableFields', 'Name');
$grid->AddColumnTable('FromTable', 'Tabela Link', 250, 'sysTables', 'Name');

$grid->PrintHTML();
?>