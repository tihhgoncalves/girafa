<?
$grid = new nbrAdminGrid('sysTableFields', 'Campos');

//Complementos SQL...
$grid->AddControlOrder('Order');

//Arquivos Complementares...
$grid->formFile  = 'admin.tables.fields.form.php';
$grid->macroFile = 'admin.tables.fields.macro.php';

//Colunas...
$grid->AddColumnString('Name', 'Nome do Campo', 200);
$grid->AddColumnList('Type', 'Tipo', 150, 'STR=String|INT=Inteiro|NUM=Numero Decimal|BOL=Lógico|TAB=Tabela|LST=Lista|DTA=Data|DTT=Data e Hora|TXT=Texto|IMG=Imagem|FIL=Arquivo|PSW=Senha');
$grid->AddColumnInteger('Length', 'Tamanho', 85);

$grid->PrintHTML();
?>