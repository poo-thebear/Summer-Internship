<?php
if (isset($_GET['q'])) {
  $status = $_GET['q'];
  if ($status == 'email_sent') {
    $msg = "<font color='green'>An email has been sent to your account. <br>Check your Inbox</font>";
  }
  if ($status == "email_not_found") {
    $msg = "<font color='red'>Enter correct email.</font>";
  }
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
    .container {
      max-width: 500px;
    }

    .form-content .login-form {
      width: 100%;
    }
  </style>
</head>

<body>

  <div class="container">

    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Reset Password</div>
          <form action="submitEmailCode.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>

              <div class="button input-box">
                <input type="submit" name="submitEmail" value="Sumbit">
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

</body>

</html>