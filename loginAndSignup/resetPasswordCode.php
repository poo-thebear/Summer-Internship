<?php
require('conn.php');

if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    if (!empty($token)) {
        
        // if (!empty($email) && !empty($new_password) && !empty($confirm_passsord)) {
            // Checking Token is Valid or not
            $check_token = "SELECT verify_token FROM tb_reset WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);
            
            if (mysqli_num_rows($check_token_run) > 0) {
                
                if ($new_password == $confirm_password) {
                    $new_password= password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                    $update_token= "UPDATE `tb_user` SET token = '$token' WHERE email= '$email'";
                    $update_token_run=mysqli_query($conn, $update_token);
                    
                    $update_password = "UPDATE `tb_user` SET pwd='$new_password' WHERE token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);
                    
                    if ($update_password_run) {
                        $new_token = md5(rand()) . "renewed";
                        $update_to_new_token = "UPDATE tb_reset SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);
                        
                        //New Password successfully Updated
                        header("location:resetPassword.php?q=password_changed");
                        exit(0);
                    } 
                    else {
                        //not update password. Something went wrong
                        header("location:resetPassword.php?token=$token&email=$email");
                        exit(0);
                    }
                } 
                else {
                    //password nd confirm password doesn't match
                    header("location:resetPassword.php?token=$token&email=$email?q=pwd_not_matched");
                    exit(0);
                }
            } 
            else {
                //invalid token
                header("location:resetPassword.php?token=$token&email=$email?q=invalid_token");
            }
        // }
        // else {
        //     //all fields are mandatory
        //     header("location:resetPassword.php?token=$token&email=$email?q=all_fields_mandatory");
        //     
        // }
    } 
    else {
        //no token available
        header("location:resetPassword.php?q=no_token_available");
    }
}
?>
