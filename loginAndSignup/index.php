<?php
$string1 = "<div id='box' class='msgbox1 red'>
              <div id='close' class='arrow-t-b'>
                <i class='fa fa-times' aria-hidden='true' onclick='return disappear()'></i>
              </div>
              <div class='msg'>";
$string2 = "</div> </div>";



//Login Up - Red message box
if (isset($_GET['login_status'])) {
  $login_status = $_GET['login_status'];
  //Login Failed (entered data doesn't match the data present in database)
  if ($login_status == 0) {
    echo ($string1."Either Email or Password Incorrect".$string2);
  }
}


//Sign Up - Red message box
if (isset($_GET['sign_status'])) {
  $sign_status = $_GET['sign_status'];
  //email already exists in database
  if ($sign_status == 0) {
    echo ($string1."Email Already Exists".$string2);
  }
  
  //Incorrect email format
  if ($sign_status == 2) {
    echo ($string1."Enter Correct Email".$string2);
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
  <!-- javascript -->
  <script src="script.js"></script>

  <style>
    .container {
      height: fit-content;
    }

    .msgbox1 {
      width: fit-content;
      top: 8%;
      padding: 10px 20px 10px 20px;
      background-color: ;
      border: ;
      /* margin: 20px 20px 20px 20px; */
      overflow: visible;
      box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.12), 0px 2px 8px rgba(0, 0, 0, 0.08);
      position: absolute;
    }

    .red {
      border: 1px solid #DC143C;
      background: #FFA07A;
    }

    .green {
      border: 1px solid #13dd13;
      background: #a7ffa7;
    }

    .msg {
      text-align: center
    }

    #close {
      position: absolute;
      top: -10px;
      right: -10px;
    }

    #close i {
      background-color: #fff;
      border-radius: 20px;
      padding: 2px 4px 1px 4px
    }

    #close:hover {
      color: #39F;
    }
  </style>
</head>

<body>

  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="Images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="Images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form action="login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="submitEmail.php">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="submitBtn" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip" id="flipBtn">Sigup
                  now</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="signup.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="fname" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="submitBtn" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>