<?php
require('conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

function send_password_reset($get_name, $get_email, $token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'leemichael2992@gmail.com';                     //SMTP username
    $mail->Password   = 'fveefpscivwvtrzr';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Reset Password');
    $mail->addAddress($get_email, $get_name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Change Password';

    $mail_template="Change your Password <a href='http://localhost/programs/loginAndSignup2/resetPassword.php?token=$token&email=$get_email'>Click Here</a>" ;

    $mail->Body    = $mail_template;

    $cookieName = "email_sent";
    $cookieValue = "email_sent";
    $expiryTime = time() + (600);

    setcookie($cookieName, $cookieValue, $expiryTime);

    $mail->send();
    echo 'Message has been sent';
}

if (isset($_POST['submitEmail'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());





    $check_email = "SELECT fname, email FROM tb_reset WHERE email= '$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    
     

    if (!(mysqli_num_rows($check_email_run) > 0)) {

        //if email exists in tb_user then Insert that email in tb_reset
        $sql = "SELECT `email`, `fname` FROM `tb_user` WHERE 1";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($user = mysqli_fetch_assoc($result)) {

                if (!($user['email'] == $email)) {
                    header('location:submitEmail.php?q=email_not_found');
                } else if ($user['email'] == $email) {
                    $fname= $user['fname'];
                    $insert_email_into_tb_reset = "INSERT INTO tb_reset (fname, email, verify_status) VALUES('$fname', '$email', 0)";
                    $insert_email_into_tb_reset_run = mysqli_query($conn, $insert_email_into_tb_reset);

                    $update_token = "UPDATE tb_reset SET verify_token='$token' WHERE email='$email'";
                    $update_token_run = mysqli_query($conn, $update_token);

                    if ($update_token_run) {
                        send_password_reset($fname, $email, $token);
                        header("location:submitEmail.php?q=email_sent");
                        exit(0);
                    } else {
                        header("location:submitEmail.php");
                        exit(0);
                    }
                }
            }
        }
    }

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['fname'];
        $get_email = $row['email'];
        $update_token = "UPDATE tb_reset SET verify_token='$token' WHERE email='$get_email'";
        $update_token_run = mysqli_query($conn, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            
            header("location:submitEmail.php?q=email_sent");
            exit(0);
        } else {
            header("location:submitEmail.php");
            exit(0);
        }
    }
    // else {
    //     header("location:password-reset.php");
    //     exit(0);
    // }
}
?>