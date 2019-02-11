<!DOCTYPE html>
<html>
<style>
h1{
font-size:50px;
}
</style>
<body>

	<center>
	</br></br>
	<a href="./index.php"><input type="button" value="Home"></a>
    </br></br></br></br></br></br></br>
    
<?php
$uname = $_POST['uname'];
$psw = $_POST['psw'];

if ($uname == 'admin' && $psw == 'csb7071') {
    header("Location: ./register.html");
    exit();
} else {
    print("<h1>Login Failed !!</h1>");
}

?>

	</centre>
</body>
</html>