<?php
session_start();
if (isset($_COOKIE['user'])) {
    $display = 1;
} 
else {
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($display)) {
        ?>




        WELCOME
        <a href="index.php">index.php</a>




        <?php
    }
    ?>
</body>

</html>