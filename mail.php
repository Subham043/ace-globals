<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function nameValidator($val){
    if(empty($val)){
        return true;
    }
    return false;
}
function emailValidator($val){
    if(empty($val)){
        return true;
    }
    return false;
}
function phoneValidator($val){
    if(empty($val)){
        return true;
    }
    return false;
}
function subject_messageValidator($val){
    if(empty($val)){
        return true;
    }
    return false;
}

$name      =  $_POST['name'];
$subject     =  $_POST['subject'];
$email     =  $_POST['email'];
$phone     =  $_POST['phone'];
$message   =  $_POST['message'];

if(nameValidator($name)){

    http_response_code(400); 
    echo json_encode(array("form_error"=>array("name"=>"Name field is invalid")));
    exit;
}

    $body='<h2>Ace Global</h2>

    <table style="width:100%">
    <tr>
        <td style="height:40px">Fullname</td>
        <td style="height:40px">'.$name.'</td>
    </tr>
    <tr>
        <td style="height:40px">last name</td>
        <td style="height:40px">'.$subject.'</td>
    </tr>
    <tr>
        <td style="height:40px">Email</td>
        <td style="height:40px">'.$email.'</td>
    </tr>
    <tr>
        <td style="height:40px">Mobile</td>
        <td style="height:40px">'.$phone.'</td>
    </tr>
    <tr>
        <td style="height:40px">Message</td>
        <td style="height:40px">'.$message.'</td>
    </tr>                      
    </table>';


//Load Composer's autoloader
require 'vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
   // $mail->SMTPDebug = 3;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.ashwasuryarealities.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@ashwasuryarealities.com';                     //SMTP username
    $mail->Password   = 'C}CL?~^HQ*mM';                               //SMTP password
    $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('info@ashwasuryarealities.com', 'Ace Global');
    $mail->addAddress('subham.5ine@gmail.com', 'Ace Global');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    =  $body.$body_2;
    $mail->send();
    //echo 'Message has been sent';
    if($_SERVER['HTTP_HOST']=='localhost'){
        header("Location:http://".$_SERVER['HTTP_HOST']."/ashwasurya/thankyou-page.html");
    }else{
        header("Location:https://".$_SERVER['HTTP_HOST']."/AshwaSurya/thankyou-page.html");
    }
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>