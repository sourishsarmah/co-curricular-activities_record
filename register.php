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
include("connection_str.php");

$name = $_POST["name"];
$id = $_POST["id"];
$cat = $_POST["cat"];

$query = "insert into $cat values ('$id','$name')";

$query_str = oci_parse($con_str, $query);

if (!oci_execute($query_str)) {
    print("<h1>Registered Failed !!<h1>");
    exit;
}
else{
    print("<h1>Registered Sucessfully !!<h1>");

}
?>


	</centre>
</body>
</html>

