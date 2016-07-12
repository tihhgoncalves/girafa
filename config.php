<?

/**
 * Gerais
 */
$GLOBALS["SITE_TITLE"]              = "Título do Site";
$GLOBALS["SITE_PAGEINDEX"]          = "home";


/**
 * Path's
 */
$GLOBALS["ROOT_PATH"]               = "D:/github/girafa/bower_components/girafaCMS/";
$GLOBALS["ROOT_URL"]                = "http://localhost/github/girafa/";


/**
 * DB
 */
$GLOBALS["DB_HOST"]                 = "localhost";
$GLOBALS["DB_USER"]                 = "root";
$GLOBALS["DB_PASS"]                 = "";
$GLOBALS["DB_PORT"]                 = "";
$GLOBALS["DB_DATABASE"]             = "nome_do_db";
$GLOBALS["DB_PERSISTENT"]           = true;


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
$GLOBALS["EMAIL_CONFIG"]            = $email;

?>
