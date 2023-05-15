<?php
// require . '..//vendor/autoload.php';
require '../vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




    //Simple page redirect
    function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }

    function sendmail($data){
  
        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();  
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication 
                                                //Send using SMTP
        $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
        $mail->Username   = 'kavindi.tharushika98@gmail.com';                     //SMTP username
        $mail->Password   = 'bUCxJZ3W7ALh1FM8';                               //SMTP password

        $mail->SMTPSecure = 'tls';           //Enable implicit TLS encryption
        $mail->Port       = 587;   

        $mail->setFrom('poornimajayathilake1999@gmail.com', 'Mailer');
        $mail->addAddress($data['email']);     //Add a recipient
        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Sending Loging credencials';

        $email_template = "
            <h2>You are Registered in MOHTHER</h2>
            <h3>Here are your login credentials</h3>
            <b>Username : </b> {$data['nic']} <br>
            <b>Password : </b> {$data['password']} <br>
        ";


        $mail->Body = $email_template;

        $mail->send();
        // echo 'Message has been sent';
        
    
    }