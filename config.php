<?
$config                           = array();

/**
 * Gerais
 */
$config["SITE_TITLE"]              = "Título do Site";
$config["SITE_PAGEINDEX"]          = "home";
$config["SITEKEY"]                = "123456789";


/**
 * Path's
 */
if(is_localhost()){
  $config["ROOT_PATH"]               = "D:/GitHub/girafa/";
  $config["ROOT_URL"]                = "http://localhost/github/girafa/";
} else {
  $config["ROOT_PATH"]               = "\home\zbra\girafa/";
  $config["ROOT_URL"]                = "http://www.girafa.com.br/";
}

/**
 * DB
 */
if(is_localhost())
  $config["DB_HOST"]                 = "tiago.art.br";
else
  $config["DB_HOST"]                 = "localhost";
$config["DB_USER"]                 = "root";
$config["DB_PASS"]                 = "";
$config["DB_PORT"]                 = "";
$config["DB_DATABASE"]             = "girafa";
$config["DB_PERSISTENT"]           = true;


/**
 * E-mail
 */
$email                              = array();
$email["FROMNAME"]                  = "Nome do Remetente";
$email["FROM"]                      = "eu@dominio.com.br";
$email["SENDTYPE"]                  = "mail";
$email["CC"]                        = "";
$email["CCO"]                       = "";
$email["SMTPHOST"]                  = "";
$email["SMTPUSER"]                  = "";
$email["SMTPPASS"]                  = "";
$email["SMTPSECURE"]                = "";    //ssl tls (ou deixe em branco)
$email["SMTPPORT"]                  = "";
$config["EMAIL_CONFIG"]            = $email;

?>
