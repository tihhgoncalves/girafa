<?
//Apaga Todos os Constrains das tabelas..

$sql  = 'SELECT A.Name fk, B.Name FromTableName, C.Name FieldName, D.Name ToTableName FROM sysTableConstrains A';
$sql .= ' LEFT JOIN sysTables B ON(B.ID = A.FromTable)';
$sql .= ' LEFT JOIN sysTableFields C ON(C.ID = A.FromField)';
$sql .= ' LEFT JOIN sysTables D ON(D.ID = A.ToTable)';

$constrains = $db->LoadObjects($sql);

foreach ($constrains as $constrain) {
 $sql = "ALTER TABLE `" . $constrain->FromTableName . "` DROP FOREIGN KEY `" . $constrain->fk . "`;";

 try{
   $db->Execute($sql);
 } catch (Exception $e) {
   $x = $db->errorMsg;
   //returnError('Ocorreu um erro ao tentar excluir constrains.', $db->errorMsg);
 }
}

//Agora, re-cria todos eles...
foreach ($constrains as $constrain) {
 $sql = "ALTER TABLE `$constrain->FromTableName` ADD CONSTRAINT `$constrain->fk` FOREIGN KEY (`$constrain->FieldName`) REFERENCES `$constrain->ToTableName`(`ID`);";
 try{
   $db->Execute($sql);
 } catch (Exception $e) {
   returnError('Ocorreu um erro ao tentar re-criar constrains.', $db->errorMsg);
 }
}

$dataSet->SetParam('msgSucess', 'Constrains re-criados com sucesso.');

$hub->BackLevel(2);
header('Location:' . $hub->GetUrl());


?>