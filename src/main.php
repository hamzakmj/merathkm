<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../composer/vendor/autoload.php';
$errors = [];
$inputs = [];

if (is_post_request()) {


    $fields = [
        'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'email' => 'email | required ',
        'subject' => 'string | required  ',
        'message_user' => 'string | required  '
    ];

    // custom messages
    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);
    //Create a new PHPMailer instance
    $mail = new PHPMailer();

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    //SMTP::DEBUG_OFF = off (for production use)
    //SMTP::DEBUG_CLIENT = client messages
    //SMTP::DEBUG_SERVER = client and server messages
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

    //Set the SMTP port number:
    // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
    // - 587 for SMTP+STARTTLS
    $mail->Port = 465;

    //Set the encryption mechanism to use:
    // - SMTPS (implicit TLS on port 465) or
    // - STARTTLS (explicit TLS on port 587)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'hamzajahamah@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'nutehncotqkcszsl';

    //Set who the message is to be sent from
    //Note that with gmail you can only use your account address (same as `Username`)
    //or predefined aliases that you have configured within your account.
    //Do not use user-submitted addresses in here
    //echo var_dump($inputs);
    //$mail->setFrom($inputs['email'],$inputs['username']);
    $mail->setFrom('from@example.com', 'First Last');

    //Set an alternative reply-to address
    //This is a good place to put user-submitted addresses
    $mail->addReplyTo($inputs['email'], $inputs['username']);

    //Set who the message is to be sent to
    $mail->addAddress('hamzajahamah@gmail.com', 'hamzakmj');
                                  //Set email format to HTML
    $mail->Subject = $inputs['subject'];
    $mail->Body    = $inputs['message_user'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    echo 'Message sent!';
    //send the message, check for errors
    if ($mail->send()) {
        redirect_with_message('/../merath/public/main.php','تم ارسال رسالتك بنجاح',FLASH_SUCCESS);
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        redirect_with_message('/../merath/public/main.php','فشل في ارسال رسالتك',FLASH_ERROR);
        //echo 'Message sent!';
    }
} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
