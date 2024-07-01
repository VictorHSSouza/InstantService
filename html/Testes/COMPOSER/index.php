<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->SMTPDebug = 2;                                   // Ativa saída de depuração detalhada (opcional)
    $mail->isSMTP();                                        // Define o envio como SMTP
    $mail->Host       = 'smtp.gmail.com';                   // Servidor SMTP do Gmail
    $mail->SMTPAuth   = true;                               // Habilita autenticação SMTP
    $mail->Username   = 'instantserviceapp@gmail.com';               // Seu endereço de email
    $mail->Password   = 'zzkawqjqkkhgezbx';                         // Sua senha do email
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Ativa criptografia TLS
    $mail->Port       = 587;                                // Porta TCP para TLS

    // Configurações do remetente
    $mail->setFrom('instantserviceapp@gmail.com', 'InstantService');
    $mail->addAddress('henriquenicolletti@gmail.com', 'VICTAO');     // Adiciona um destinatário
    $mail->addReplyTo('logindetudo123@gmail.com', 'Informaçoes');    // Email para resposta

    // Definindo a codificação de caracteres
    $mail->CharSet = 'ISO-8859-01';

    // Conteúdo do email
    $mail->isHTML(true);                                    // Define o formato do email como HTML
    $mail->Subject = 'QUEM OLHAR É GAY';
    $mail->Body    = 'Email enviado automaticamente por <b style="color: yellow;">InstantService</b>';
    $mail->AltBody = 'Este é o corpo do email em texto puro para clientes de email que não suportam HTML';

    $mail->send();
    echo 'Mensagem enviada com sucesso';
} catch (Exception $e) {
    echo "A mensagem não pode ser enviada. Erro do Mailer: {$mail->ErrorInfo}";
}
?>
