<?php
session_start();

$_SESSION['roll_no'] = $_POST['roll_no'];
$_SESSION['cat'] = $_POST['cat'];
if (strcmp($_POST['submit'], "searchbyroll") == 0) {
    header("Location: ./allInfo.php");
    exit();
}
else{
    header("Location: ./catInfo.php");
    exit();
}

?>
