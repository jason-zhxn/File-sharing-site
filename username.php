<!DOCTYPE html>
<html lang="en">
<head>
   <title>
    account page
   </title>
   <link rel = "stylesheet" type= "text/css" href="usernamestylesheet">
</head>
<body>

<?php
// string cast for filtering input

if(isset($_GET['username'])){
    $enteredUser = (string) $_GET['username'];
}

if( !preg_match('/^[\w_\-]+$/', $enteredUser) ){
	echo "Invalid username";
	exit;
}

$currentUser= (string) $_GET['username'];

$usersList = fopen("/srv/M2CSE330/users.txt", "r");

$hasUser = FALSE;

while( !feof($usersList) ){

    $iterator = trim(fgets($usersList));
	if($iterator==$enteredUser){
        $hasUser = TRUE;
        $currentUser = $iterator;
        session_start();
        $_SESSION['username']= $currentUser;
        break;
    }
}


if(!$hasUser){
    header("Location: createUser.html");
    exit;
}

fclose($usersList);


echo("welcome to your account $currentUser!");
?>
<br><br>



<h2>
your current files are: 
</h2>

<?php
// displays files that the specific user has already
$userDirectory = sprintf("/srv/M2CSE330/%s", $_SESSION['username']);
$userFiles = array_diff(scandir($userDirectory), array('.', '..'));
foreach( $userFiles as $fileNames){
    print("  $fileNames  ,  ");
}
?>


<!-- button to upload files -->
<form enctype="multipart/form-data" action="upload.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>

<br>

<!-- button to open files -->
<form name ="input" action = "open.php" method="get">
        Copy and paste a file you'd like to OPEN from the file list above: <input type = "text" name="fileName"/>
        <input type = "submit" value = "Submit" />
</form>

<!-- button to delete files -->
<form name ="input" action = "delete.php" method="get">
        Copy and paste a file you'd like to DELETE from the file list above: <input type = "text" name="fileName"/>
        <input type = "submit" value = "Submit" />
</form>

<br>
<!-- button to logout -->
<form action="logout.php" >
        <input type = "submit" value = "Log out" />
</form>





</body>
</html>