<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require './vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $mail = new PHPMailer(true);
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ];

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->IsHTML(true);
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'cuentaprueba23072022@gmail.com';       //SMTP username
            $mail->Password   = 'estrella2TM';                          //SMTP password
           // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;  

            
            $mail->setFrom("cuentaprueba23072022@gmail.com", "Luis Alburqueque");
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $content;

            try{
                $response = $mail->send();
                return $response;
            }catch(Exception $e){
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return false;
            }
        }
    };
?>