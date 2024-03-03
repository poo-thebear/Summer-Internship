<?php
  if(isset($_COOKIE['email_sent'])){
    $status=1;
    if(isset($_GET['q'])){
      $result=$_GET['q'];
      if($result=='password_changed'){
        $msg="<font color='green'>Password changed. <a href='index.php'>Login Now.</a></font>";
      }
    }
    if(isset($_GET['email'])& isset($_GET['token'])){
    $url_email= $_GET['email'];
    $url_token= $_GET['token'];
    }
    
  }
  else{
    echo("<script>window.location='submitEmail.php'</script>");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- icon -->
  <script src="https://kit.fontawesome.com/0ca5b140a9.js" crossorigin="anonymous"></script>
<style>
    .container{
        max-width:500px;
    }
    .form-content .login-form{
  width: 100%;
}
</style>
</head>

<body>
<?php 
if(isset($status)){
  ?>
  <div class="container">
    
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Reset Password</div>
          <form action="resetPasswordCode.php" method="post">
            <div class="input-boxes">
              
            <div class="input-box">
            <i class="fas fa-envelope"></i>
                <input type="text" name="email" value="<?php if(isset($url_email)){echo $url_email;} ?>" readonly>
                
              </div>
              <input type="text" name="password_token" value="<?php if(isset($url_token)){echo $url_token;} ?>" readonly hidden>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="new_password" placeholder="New Password" required>
              </div>
              
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="password_update" value="Sumbit">
              </div>
              <?php
              if (isset($msg)) {
                echo ("<div>$msg</div>");
              }
              ?>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  <?php
}
?>
</body>

</html>