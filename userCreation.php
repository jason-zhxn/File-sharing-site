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



$path = sprintf("/srv/M2CSE330/%s",$_GET['newUser']);

mkdir($path,0775,true);


$file = fopen('/srv/M2CSE330/users.txt', 'a');

fwrite($file,  $_GET['newUser'] . "\r\n");


fclose($file);

?>
Thank you for creating an account!
    <br>
<a href = "loginPage.php"> Now log in with your new username here:</a>


    
</body>
</html>