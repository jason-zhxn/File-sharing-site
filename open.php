<?php
session_start();

$filename = $_GET['fileName'];
$filename = trim($filename);

$full_path = sprintf("/srv/M2CSE330/%s/%s", $_SESSION['username'], $filename);

// Now we need to get the MIME type (e.g., image/jpeg).  PHP provides a neat little interface to do this called finfo.
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($full_path);

// Finally, set the Content-Type header to the MIME type of the file, and display the file.
header("Content-Type: ".$mime);
header('content-disposition: inline; filename="'.$filename.'";');
ob_clean();
readfile($full_path);

?>
    
</body>
</html>