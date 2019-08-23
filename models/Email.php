<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/libs/PHPMailer/src/PHPMailer.php';
require 'assets/libs/PHPMailer/src/Exception.php';
require 'assets/libs/PHPMailer/src/SMTP.php';

class Email extends Model
{

    public function sendMail($url, $address)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'email-ssl.com.br';
        $mail->Username = 'naoresponder@laboratoriounilab.com.br';
        $mail->Password = 'respostaunilab';
        $mail->SMTPAuth = true;
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->setFrom('naoresponder@laboratoriounilab.com.br', 'Não responder - Unilab');
        $mail->isHTML(true);
        $mail->addAddress($address);
        $mail->Subject = 'Bem-vindo(a) ao nosso sistema!';
        $mail->Body = 'Obrigado por se cadastrar em nosso sistema. <br> Por favor, clique no link abaixo e ative o seu cadastro: <br><br>' . $url;
        $mail->AltBody = 'Obrigado por se cadastrar em nosso sistema. <br> Por favor, clique no link abaixo e ative o seu cadastro: <br><br>' . $url;

        if ($mail->send()) {
            return 'sucesso';
        } else {
            return 'error';
        }
    }
}
