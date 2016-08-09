<?
function macroBeforePost($tableName, $id){
  global $db;

  //Parâmetros..
  $name       = utf8_decode(trim($_POST['Name']));
  $table      = utf8_decode(trim($_POST['Table']));
  $type       = utf8_decode(trim($_POST['Type']));
  $length     = utf8_decode(trim($_POST['Length']));
  $tableLink  = utf8_decode(trim($_POST['TableLink']));
  
  //Pega Nome da Tabela..
  $sql = 'SELECT * FROM sysTables WHERE ID = ' . $table;
  $res = $db->LoadObjects($sql);
  $tableName = $res[0]->Name;
    
  //se for novo registro..
  if($id <= 0){

    //verifica se nome do campo tem caracters especiais..
    $caracts = array('-', 'á', 'à', 'â', 'ã', 'ª', 'é', 'è', 'ê', 'ó', 'ò', 'ô', 'õ', 'º', 'ú', 'ù', 'û', 'í', 'ç', ' ');
    
    foreach ($caracts as $caract) {
    
      if(!(strpos(utf8_encode($name), $caract) === false)){
        returnError('O nome do campo deve conter somente letras sem espaço e caracteres especiais.');
        return;  	
      }
    }
    
    //Verifica se já existe uma campo com este nome nesta tabela...
    $sql = "SELECT ID FROM sysTableFields WHERE `Table` = $table AND `Name` = '$name'";
    $res = $db->LoadObjects($sql);
    
    if(count($res) > 0) {
      returnError('<b>Ops!</b> Já existe uma campo com este mesmo nome nesta tabela.');
      return;
    }

    //Cria tabela Fisicamente..
    switch($type){
      case 'STR':

        if(!isset($_POST['Length']) || empty($_POST['Length']))
          returnError('Para um campo do Tipo String, é necessário que você prencha o campos Tamanho.');
        
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` VARCHAR(' . $length . ') NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo String fisicamente no banco de dados.', $db->errorMsg);
        }
        break; 
      
      case 'PSW':

        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` VARCHAR(32) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo String fisicamente no banco de dados.', $db->errorMsg);
        }
        break; 
        
      case 'NUM':

        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` decimal(18, 2) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Numero Decimal fisicamente no banco de dados.', $db->errorMsg);
        }
        break;
        
      case 'IMG':

        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` VARCHAR(50) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Imagem fisicamente no banco de dados.', $db->errorMsg);
        }
        break;        
      case 'FIL':
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` VARCHAR(50) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Arquivo fisicamente no banco de dados.', $db->errorMsg);
        }
        break;        
        
      case 'TXT':
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` text NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Texto fisicamente no banco de dados.', $db->errorMsg);
        }
        break;
      
      case 'TAB':
        
        if(!isset($_POST['TableLink']) || empty($_POST['TableLink']))
          returnError('Para um campo do Tipo Tabela, é necessário que você escolha uma Tabela Link.');
        
        //Pega Nome da Tabela Link..

        $sql = 'SELECT * FROM sysTables WHERE ID = ' . $tableLink;
        $res = $db->LoadObjects($sql);
        $tableLinkName = $res[0]->Name;        
       
        $constrainName = 'fk_' .strtolower($tableName) . '_' . strtolower($name);
        
        //Cria campo..
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '`int(11) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Tabela fisicamente no banco de dados.', $db->errorMsg);
        }
        //Adiciona fisicamente constrain
        $sql = "ALTER TABLE `$tableName` ADD CONSTRAINT `$constrainName` FOREIGN KEY (`$name`) REFERENCES `$tableLinkName`(`ID`);";
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro adicionar Constrain fisicamente no Banco de Dados.', $db->errorMsg);
        }
        break;
        
      case 'INT':
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` int(11) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Inteiro fisicamente no banco de dados.', $db->errorMsg);
        }
        break;   
             
      case 'BOL':
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` char(1) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Lógico fisicamente no banco de dados.', $db->errorMsg);
        }
        break;

      case 'LST':

        if(!isset($_POST['ListValues']) || empty($_POST['ListValues']))
          returnError('Para um campo do Tipo Lista, é necessário que você prencha o campos Opções.');

        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` char(3) NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Lista fisicamente no banco de dados.', $db->errorMsg);
        }
        break;
        
      case 'DTA':
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` datetime NULL';
        $res = $db->Execute($sql);
        break;        
      
      case 'DTT':
        $sql = 'ALTER TABLE `' . $tableName . '` ADD `' . $name . '` datetime NULL';
        try{
          $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar criar campo do tipo Data Hora fisicamente no banco de dados.', $db->errorMsg);
        }
        break;
    }
    
  } else {
  
   $sql  = "ALTER TABLE `$tableName`"; 
    
   switch($type){
      case 'STR':

        $sql .= " MODIFY $name VARCHAR($length) NULL";
        
        try {
         $db->Execute($sql);
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar alterar campo String fisicamenta no banco de dados.', $db->errorMsg);     
        }
        break;
    }
  }
}

function macroAfterPost($tableName, $id){
  
  global $db;
  $name       = utf8_decode(trim($_POST['Name']));
  $table      = utf8_decode(trim($_POST['Table']));
  $type       = utf8_decode(trim($_POST['Type']));
  $length     = utf8_decode(trim($_POST['Length']));
  $tableLink  = utf8_decode(trim($_POST['TableLink']));
  
  $tableObj = LoadRecord('sysTables', $table);

  switch ($type) {
    case 'TAB':
        //Registrar Constrains no Sistema
        $constrainName = 'fk_' .strtolower($tableObj->Name) . '_' . strtolower($name);
        $sql = "INSERT INTO `sysTableConstrains` (`Name`, `FromTable`, `FromField`, `ToTable`) VALUES ('$constrainName', $table, $id, $tableLink)";

        try {
          $res = $db->Execute($sql);      
        } catch (Exception $e){
          returnError('Ocorreu um erro ao tentar cadastrar Constrain no Sistema.', $e->getMessage());
          return;
        }
      
  }
}

function macroBeforeDelete($tableName, $reg){
  global $db;
  
  //Pega nome da tabela..
  $sql = 'SELECT * FROM sysTables WHERE ID = ' . $reg->Table;
  $res = $db->LoadObjects($sql);
  
  $table = $res[0];
  
  switch ($reg->Type) {
  	case 'TAB':
  	  $constrainName = 'fk_' .strtolower($table->Name) . '_' . strtolower($reg->Name);
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
  		$sql = "DELETE FROM sysTableConstrains WHERE FromField= " . $reg->ID;
      
  		try {
  		  $res = $db->Execute($sql);
  		} catch (Exception  $e){
  		  returnError('Ocorreu um erro ao tentar excluir Constrain do Controle do Framework.', $e->getMessage());
    		return;
 		}
  }
  
  //Exclue campo..
  $sql = "ALTER TABLE " . $table->Name;
  $sql .= " DROP COLUMN `" . $reg->Name . "`";
  
  try {
    $res = $db->Execute($sql);
  } catch (Exception $e){
    returnError('Ocorreu um erro ao tentar excluir o campo fisicamente do Banco de Dados.', $e->getMessage());    
  }
}
?>