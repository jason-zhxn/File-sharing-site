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
session_start();


$username = $_SESSION['username'];

$filename = $_GET['fileName'];
$filename = trim($filename);

$full_path = sprintf("/srv/M2CSE330/%s/%s", $username, $filename);

//returns success or failure for deletion of file
// htmlentities is used to escape unwanted output

if (unlink($full_path)) {
    echo htmlentities("$full_path has been successfully deleted!");
}
else {
    echo htmlentities("$full_path could not be deleted");
}

?>
    
    <form name ="input" action = "username.php" method="get">
        Retype your Username to return to your account: <input type = "text" name="username"/>
        <input type = "submit" value = "Submit" />
</form>
</body>
</html>