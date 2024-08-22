<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends PHPMailer{
    private $email_envio = "instantserviceapp@gmail.com";
    private $nome_envio = "InstantService";

    protected $email_destinatario;
    protected $nome_destinatario;

    protected $email_resposta = 'instantserviceapp@gmail.com';
    protected $nome_resposta = "InstantService";

    protected $assunto;
    protected $corpo_html;
    protected $corpo_semhtml;

    protected $dados;
    

    public function __get($atributo) {
        return $this->$atributo;
    }
    public function __set($atributo,$valor) {
        $this->$atributo = $valor;
    }
    
    private function enviar_email(){

        try {
            // Configurações do servidor
            $this->SMTPDebug = 2;                                   // Ativa saída de depuração detalhada (opcional)
            $this->isSMTP();                                        // Define o envio como SMTP
            $this->Host       = 'smtp.gmail.com';                   // Servidor SMTP do Gmail
            $this->SMTPAuth   = true;                               // Habilita autenticação SMTP
            $this->Username   = "$this->email_envio";                 // Seu endereço de email
            $this->Password   = 'zzkawqjqkkhgezbx';                         // Sua senha do email
            $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Ativa criptografia TLS
            $this->Port       = 587;                                // Porta TCP para TLS

            // Configurações do remetente
            $this->setFrom("$this->email_envio", "$this->nome_envio");
            $this->addAddress("$this->email_destinatario", "$this->nome_destinatario");     // Adiciona um destinatário
            $this->addReplyTo("$this->email_resposta", "$this->nome_resposta");    // Email para resposta

            // Definindo a codificação de caracteres
            $this->CharSet = 'ISO-8859-01';

            // Conteúdo do email
            $this->isHTML(true);                                    // Define o formato do email como HTML
            $this->Subject = "$this->assunto";
            $this->Body    = "$this->corpo_html";
            $this->AltBody = "$this->corpo_semhtml";                  //caso o cliente não aceite html

            $this->send();
            //echo 'Mensagem enviada com sucesso';
        } catch (Exception $e) {
            //echo "A mensagem não pode ser enviada. Erro do Mailer: {$this->ErrorInfo}";
        }
    }

    public function email_cad_pedido() {
        //var_dump($this->dados);
        //echo $this->email_destinatario;
        $this->assunto = "Pedido Recebido - InstantService";

        $this->corpo_html = '
        
            <!DOCTYPE html>
                <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Pedido Recebido - InstantService</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                            color: #333;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            text-align: center;
                            background-color: #2a9df4;
                            padding: 20px 0;
                            color: #ffffff;
                        }
                        .header h1 {
                            margin: 0;
                            font-size: 24px;
                        }
                        .content {
                            margin: 20px 0;
                        }
                        .content h2 {
                            font-size: 20px;
                            color: #2a9df4;
                            margin-bottom: 10px;
                        }
                        .content p {
                            font-size: 16px;
                            line-height: 1.5;
                            margin: 10px 0;
                        }
                        .button {
                            text-align: center;
                            margin: 20px 0;
                        }
                        .button a {
                            background-color: #2a9df4;
                            color: #ffffff;
                            padding: 10px 20px;
                            text-decoration: none;
                            border-radius: 5px;
                            font-size: 16px;
                        }
                        .footer {
                            text-align: center;
                            font-size: 14px;
                            color: #777777;
                            margin-top: 20px;
                            padding-top: 20px;
                            border-top: 1px solid #eeeeee;
                        }
                        .footer a {
                            color: #2a9df4;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <h1>InstantService</h1>
                        </div>
                        <div class="content">
                            <h2>Novo Pedido Recebido</h2>
                            <p>Olá ' . $this->nome_destinatario . ',</p>
                            <p>Você recebeu um novo pedido de serviço na InstantService. Veja abaixo os detalhes:</p>
                            <p><strong>Cliente:</strong> ' . $this->dados['nome'] . '</p>
                            <p><strong>Serviço Solicitado:</strong> ' . $this->dados['descricao'] . '</p>
                            <p><strong>Endereco:</strong> ' . $this->dados['endereco'] . '</p>
                            <p><strong>Data do Pedido:</strong> ' . date('d/m/Y  h:i') . '</p>
                            <p><strong>Prazo de Conclusão:</strong> ' . date('d/m/Y  h:i', strtotime('+1 day')) . '</p>
                            <p>Por favor, acesse o painel da InstantService para confirmar o pedido e entrar em contato com o cliente.</p>
                            <div class="button">
                                <a href="Localhos:8080" target="_blank">Ver Pedido</a>
                            </div>
                            <p>Se você tiver alguma dúvida, entre em contato com nossa equipe de suporte.</p>
                            <p>Atenciosamente,</p>
                            <p>Equipe InstantService</p>
                        </div>
                        <div class="footer">
                            <p>&copy; 2024 InstantService. Todos os direitos reservados.</p>
                            <p><a href="[Link para Política de Privacidade]">Política de Privacidade</a> | <a href="[Link para Termos de Serviço]">Termos de Serviço</a></p>
                        </div>
                    </div>
                </body>
            </html>'
        ;
        $this->corpo_semhtml = '
        
            Assunto: Novo Pedido Recebido - InstantService

            Olá ' . $this->nome_destinatario . ',

            Você recebeu um novo pedido de serviço na InstantService. Veja abaixo os detalhes:

            Cliente: ' . $this->dados['nome'] . '
            Serviço Solicitado: ' . $this->dados['descricao'] . '
            Data do Pedido: ' . date('d/m/Y') . '
            Prazo de Conclusão: [Prazo]

            Por favor, acesse o painel da InstantService para confirmar o pedido e entrar em contato com o cliente. Você pode acessar o painel através do link abaixo:

            [Link para o Painel de Controle]

            Se você tiver alguma dúvida, entre em contato com nossa equipe de suporte.

            Atenciosamente,
            Equipe InstantService

            InstantService
            Todos os direitos reservados.

            Política de Privacidade: [Link para Política de Privacidade]
            Termos de Serviço: [Link para Termos de Serviço]'
        ;

        $this->enviar_email();
    }

    public function email_cad_user()  {
        $this->assunto = "Conta criada - InstantService";
        $this->corpo_html = '
            <!DOCTYPE html>
                <html lang="pt-BR">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Bem-vindo à InstantService</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                            color: #333;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            text-align: center;
                            background-color: #2a9df4;
                            padding: 20px 0;
                            color: #ffffff;
                        }
                        .header h1 {
                            margin: 0;
                            font-size: 24px;
                        }
                        .content {
                            margin: 20px 0;
                        }
                        .content h2 {
                            font-size: 20px;
                            color: #2a9df4;
                            margin-bottom: 10px;
                        }
                        .content p {
                            font-size: 16px;
                            line-height: 1.5;
                            margin: 10px 0;
                        }
                        .button {
                            text-align: center;
                            margin: 20px 0;
                        }
                        .button a {
                            background-color: #2a9df4;
                            color: #ffffff;
                            padding: 10px 20px;
                            text-decoration: none;
                            border-radius: 5px;
                            font-size: 16px;
                        }
                        .footer {
                            text-align: center;
                            font-size: 14px;
                            color: #777777;
                            margin-top: 20px;
                            padding-top: 20px;
                            border-top: 1px solid #eeeeee;
                        }
                        .footer a {
                            color: #2a9df4;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <h1>Bem-vindo à InstantService!</h1>
                        </div>
                        <div class="content">
                            <h2>Olá, '.$this->nome_destinatario.'!</h2>
                            <p>Estamos muito felizes por ter você conosco na *InstantService*. Nossa plataforma foi criada para conectar você aos melhores profissionais de tecnologia, oferecendo serviços rápidos, confiáveis e de alta qualidade.</p>
                            <p>Agora que você faz parte da nossa comunidade, aqui estão algumas coisas que você pode fazer:</p>
                            <ul>
                                <li><strong>Explorar Serviços:</strong> Navegue pela nossa lista de serviços e encontre exatamente o que você precisa.</li>
                                <li><strong>Conectar-se com Profissionais:</strong> Entre em contato com os melhores profissionais de tecnologia e agende seus serviços com facilidade.</li>
                                <li><strong>Gerenciar seus Pedidos:</strong> Acompanhe todos os seus pedidos diretamente no seu painel de controle.</li>
                            </ul>
                            <div class="button">
                                <a href="localhost:8080" target="_blank">Acessar Meu Painel</a>
                            </div>
                            <p>Se precisar de ajuda, nossa equipe de suporte está sempre à disposição. Basta responder a este e-mail ou visitar nossa seção de suporte.</p>
                            <p>Atenciosamente,</p>
                            <p>Equipe InstantService</p>
                        </div>
                        <div class="footer">
                            <p>&copy; 2024 InstantService. Todos os direitos reservados.</p>
                            <p><a href="g">Política de Privacidade</a> | <a href="a">Termos de Serviço</a></p>
                        </div>
                    </div>
                </body>
            </html>'
        ;
        $this->corpo_semhtml = '
            Assunto: Bem-vindo à InstantService!

            Olá, '.$this->nome_destinatario.'!

            Estamos muito felizes por ter você conosco na InstantService. Nossa plataforma foi criada para conectar você aos melhores profissionais de tecnologia, oferecendo serviços rápidos, confiáveis e de alta qualidade.

            Agora que você faz parte da nossa comunidade, aqui estão algumas coisas que você pode fazer:

            Explorar Serviços: Navegue pela nossa lista de serviços e encontre exatamente o que você precisa.
            Conectar-se com Profissionais: Entre em contato com os melhores profissionais de tecnologia e agende seus serviços com facilidade.
            Gerenciar seus Pedidos: Acompanhe todos os seus pedidos diretamente no seu painel de controle.
            Acesse seu painel aqui: localhost:8080

            Se precisar de ajuda, nossa equipe de suporte está sempre à disposição. Basta responder a este e-mail ou visitar nossa seção de suporte.

            Atenciosamente,
            Equipe InstantService

            InstantService
            Todos os direitos reservados.

            Política de Privacidade: g
            Termos de Serviço: a'
        ;

        $this->enviar_email();
    }
}
?>
