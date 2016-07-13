<?
$nome      = $_POST['nome'];
$email     = $_POST['email'];
$msg       = $_POST['msg'];

$html  = '<p>Uma nova mensagem foi enviado a você do formulário de Contato<p>';
$html .= '<ul>';
$html .= '  <li><b>Nome:</b> ' . $nome . '</li>';
$html .= '  <li><b>E-mail:</b> ' . $email . '</li>';
$html .= '  <li><b>Mensagem:</b> ' . $msg . '</li>';
$html .= '</ul>';

$mail = new nbrMail();

$assunto = 'Mensagem do site - ' . $nome . ' (' . $email . ')';
if($mail->SendTemplate($html, $assunto, $GLOBALS['EMAIL_CONFIG']['FROM'])){
  $msg  = 'Sua mensagem foi enviada a nossa equipe com sucesso.<br>Em breve entraremos em contato.';

} else 
  $msg .= 'Ocorreu um pequeno erro técnico ao tentar enviar esta mensagem a nossa equipe.';

$msg = base64_encode($msg);
header('LOCATION: ' . $router->GetLink('msg/' . $msg));
?>