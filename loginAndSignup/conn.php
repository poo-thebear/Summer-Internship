<?php
    $username="root";
    $password="";
    $server="localhost";
    $db="db-user";

    //connection
    $conn= mysqli_connect($server, $username, $password, $db);

    if(!$conn){
        die("Not connected");
    }
?>