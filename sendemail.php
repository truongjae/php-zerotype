<?php
   include("PHPMailer/src/Exception.php");
   include("PHPMailer/src/OAuth.php");
   include("PHPMailer/src/POP3.php");
   include("PHPMailer/src/PHPMailer.php");
   include("PHPMailer/src/SMTP.php");

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   class SendEMail{
       public function send($username,$email){
        $password=""; // config password gmail vào nhé
        $mail = new PHPMailer(true);
        try{
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "truongjae@gmail.com"; // config tk nữa
            $mail->Password =$password;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->CharSet = "UTF-8";
            $mail->setFrom("truongjae@gmail.com"); // config tk nữa
            $mail->addAddress($email,"Đăng ký tài khoản thành công");
            $mail->isHTML(true);
            $mail->Subject= "Đăng ký tài khoản thành công";
            $mail->Body = "Chào ".$username."! Tài khoản của mày đã được đăng ký thành công";
            // $mail->AltBody = "rat ngoan";
            $mail->send();
            echo "message has been sent";
        }
        catch (Exception $e){
            echo "message could not be sent. Mailer Error: ", $mail->ErrorInfo; 
        }
       }
   }
   
?>