<?php
    
    include('conn.php');
    
    //after submiting
    if(isset($_POST['submitBtn'])){
        $u_name = $_POST['fname'];
        $u_email= $_POST['email'];
        $u_password= password_hash($_POST['password'], PASSWORD_DEFAULT);

        if(!filter_var($u_email, FILTER_VALIDATE_EMAIL)){
            header('location:index.php?sign_status=2');
            exit();
        }

        //email exists check
        $sql= "SELECT * FROM `tb_user` WHERE `email`='$u_email' ";
        $result= mysqli_query($conn, $sql);

        $num= mysqli_num_rows($result);
		
        if($num>0){
			while($user= mysqli_fetch_assoc($result)){
				if($user['email']==$u_email){
                    header('location:index.php?sign_status=0');
				}
			}exit();
		}
        

        //inserting data
        $sql= "INSERT INTO `tb_user` (fname, email, pwd) VALUES ('$u_name', '$u_email', '$u_password')";
        $result= mysqli_query($conn, $sql);

        if($result){
            header('location:index.php');
        }
        else{
            echo("failed");
        }
    }

?>