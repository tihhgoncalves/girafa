<?
/**
 * Macro
 */


function macroBeforePost($tableName, $id){
  global $db;

  $tableName = utf8_decode(trim($_POST['Name']));
  $comment   = utf8_decode(trim($_POST['Comment']));
  
  //se for novo registro..
  if($id <= 0){

    //verifica se nome da tabela tem caracters especiais..
    $caracts = array('-', 'á', 'à', 'â', 'ã', 'ª', 'é', 'è', 'ê', 'ó', 'ò', 'ô', 'õ', 'º', 'ú', 'ù', 'û', 'í', 'ç'
                    , ' ', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    
    foreach ($caracts as $caract) {
    
      if(!(strpos(utf8_encode($tableName), $caract) === false)){
        returnError('O nome da tabela deve conter somente letras sem espaço e caracteres especiais.');
        return;  	
      }
    }
    
    //Verifica se já existe uma tabela com este nome...
    $sql = "SELECT ID FROM sysTables WHERE Name = '$tableName'";
    $res = $db->LoadObjects($sql);
    
    if(count($res) > 0) {
      returnError('Já existe uma tabela com este mesmo nome.');
      return;
    }

    //Cria tabela Fisicamente..
    $sql  = 'CREATE TABLE `' . $tableName . '` (' . "\r\n";
    $sql .= '  `ID` int(11) NOT NULL AUTO_INCREMENT,' . "\r\n";
    $sql .= '  `Lang` varchar(10) DEFAULT NULL,' . "\r\n";
    $sql .= '  `LastUpdate` datetime DEFAULT NULL,' . "\r\n";
    $sql .= '  `LastUserName` varchar(50) DEFAULT NULL,' . "\r\n";
    $sql .= '  PRIMARY KEY (`ID`)' . "\r\n";
    $sql .= ") ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='" . $comment . "';" . "\r\n";
    
    try {
      $db->Execute($sql);
    } catch (Exception $e){
      returnError('Ocorreu um erro ao tentar criar a tabela fisicamente no banco de dados.', $db->errorMsg); 
    }
      
  } else {
    $sql = "ALTER TABLE `$tableName` COMMENT = '$comment'";
    try {
      $db->Execute($sql);
    } catch (Exception $e){
      returnError('Ocorreu um erro ao tentar alterar comentário da tabela fisicamenta no banco de dados.', $db->errorMsg);
    }
      
  }
}

function macroBeforeDelete($tableName, $reg){
  global $db;
  
  //Exclue CAMPOS...
 
  //Pega nome da tabela..
  $sql = 'SELECT * FROM sysTables WHERE ID = ' . $reg->ID;
  $res = $db->LoadObjects($sql);
  $table = $res[0];
  
  //Pega campos...
  $sql  = 'SELECT * FROM sysTableFields';
  $sql .= ' WHERE `Table` = ' . $reg->ID;
  $fields = $db->LoadObjects($sql);
  
  foreach ($fields as $field) {
  
	switch ($reg->Type) {
		
		case 'TAB':
		  $constrainName = 'fk_' .strtolower($table->Name) . '_' . strtolower($field->Name);
			//Exlue constrain..
			$sql = "ALTER TABLE " . $table->Name;
			$sql .= " DROP FOREIGN KEY `$constrainName`";
			
			try {
			  $res = $db->Execute($sql);
			} catch (Exception  $e){
			  returnError('Ocorreu um erro ao tentar excluir Constrain fisicamente do Banco de Dados.', $e->getMessage());
			return;
			}
			
			//Exclue Contrains do Controle do Sistema..
			$sql = "DELETE FROM sysTableConstrains WHERE FromField= " . $field->ID;
	  
			try {
			  $res = $db->Execute($sql);
			} catch (Exception  $e){
			  returnError('Ocorreu um erro ao tentar excluir Constrain do Controle do Framework.', $e->getMessage());
			return;
			}
	}
  
	  //Exclue campo..
	  $sql = "ALTER TABLE " . $table->Name;
	  $sql .= " DROP COLUMN `" . $field->Name . "`";
	  
	  try {
	    $res = $db->Execute($sql);
	  } catch (Exception $e){
	    returnError('Ocorreu um erro ao tentar excluir o campo fisicamente do Banco de Dados.', $e->getMessage());    
	  }
  }
  //Exclue TABELA... 

  //Apaga fisicamente a tabela..
  $sql = "DROP TABLE `" . $table->Name . "`";
  try {
      $db->Execute($sql);
    } catch (Exception $e){
      returnError('Ocorreu um erro ao tentar excluir a tabela fisicamente do Banco de Dados.', $db->errorMsg);      
    }

}
?>