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

	$errorflag = 0;

	$roll_no = $_POST["rn"];
	$fname = $_POST["fname"];
	$mname = $_POST["mname"];
	$lname = $_POST["lname"];
	$sex = $_POST["sex"];
	$dob = $_POST["DOB"];
	$sw = $_POST["sw"];
	$ca = $_POST["ca"];
	$sp = $_POST["sp"];
	$at = $_POST["at"];
	$lt = $_POST["lt"];

	$q_student = "insert into student values('$roll_no', '$fname', '$mname', '$lname', '$sex', TO_DATE('$dob', 'YYYY-MM-DD'))";
	$query = oci_parse($con_str, $q_student);
	if (!oci_execute($query, OCI_COMMIT_ON_SUCCESS)) {
		print("<h3>Student already exits !!</h3>");
	}

	if (strcmp($sw, "none")) {
		$q_does = "insert into does values('$roll_no', '$sw')";
		$query = oci_parse($con_str, $q_does);
		if (!oci_execute($query, OCI_COMMIT_ON_SUCCESS)) {
			$errorflag = 1;
		}
	}

	if (strcmp($ca, "none")) {
		$q_interested_in = "insert into interested_in values('$roll_no', '$ca')";
		$query = oci_parse($con_str, $q_interested_in);
		if (!oci_execute($query, OCI_COMMIT_ON_SUCCESS)) {
			$errorflag = 1;
		}
	}

	if (strcmp($sp, "none")) {
		$q_plays = "insert into plays values('$roll_no', '$sp')";
		$query = oci_parse($con_str, $q_plays);
		if (!oci_execute($query, OCI_COMMIT_ON_SUCCESS)) {
			$errorflag = 1;
		}
	}

	if (strcmp($at, "none")) {
		$q_likes = "insert into likes values('$roll_no', '$at')";
		$query = oci_parse($con_str, $q_likes);
		if (!oci_execute($query, OCI_COMMIT_ON_SUCCESS)) {
			$errorflag = 1;
		}
	}

	if (strcmp($lt, "none")) {
		$q_takes_part_in = "insert into takes_part_in values('$roll_no', '$lt')";
		$query = oci_parse($con_str, $q_takes_part_in);
		if (!oci_execute($query, OCI_COMMIT_ON_SUCCESS)) {
			$errorflag = 1;
		}
	}

	if ($errorflag == 0) {
		print("<h1>Successfully Inserted !!</h1>");
	} else {
		print("<h1>Insertion Failed !!</h1>");
	}
	?>

	</centre>
</body>
</html>