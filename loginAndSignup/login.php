<?php
    session_start();
    include('conn.php');
    
    //after submiting
    if(isset($_POST['submitBtn'])){
        $u_email= $_POST['email'];
        $u_password= $_POST['password'];

        $sql= "SELECT `email`, `pwd` FROM `tb_user` WHERE 1";
        $result= mysqli_query($conn, $sql);

        $cookieName = "user";
        $cookieValue = "login_done";
        $expiryTime = time() + (15 * 24 * 60 * 60); // 15 days in seconds        

        //number of rows
        $num= mysqli_num_rows($result);
		
        //checking if table consist rows
        if($num>0){
			while($user= mysqli_fetch_assoc($result)){
				if((password_verify($u_password, $user['pwd'])) && ($user['email']==$u_email)){
                    setcookie($cookieName, $cookieValue, $expiryTime);
					header('location:welcome.php');        
                }
                if(!(password_verify($u_password, $user['pwd'])) || !($user['email']==$u_email)){
                    header('location:index.php?login_status=0');
                }
			}
		}
        
    }
