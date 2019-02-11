<!DOCTYPE html>
<html>
<style>
body {
      background-color: #fafafa;
      background-repeat: no-repeat;
	background-size: cover;
}


/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}

</style>
<body>
<center>
<h1>Information</h1>
	<hr><br><br>
	<table border="2px">

            <tr>
            <th width="200">Roll No.</th>
            <th width="200">Name</th>
            <th width="200">Sex</th>
            <th width="200">Date of Birth</th>
            </tr>
	
        <?php
            include("connection_str.php");

            session_start();
            $roll_no = $_SESSION['roll_no'];
            $query = "select * from student where roll_no = '$roll_no'";
            $query = oci_parse($con_str, $query);
            if (!oci_execute($query)) {
                  print(oci_error($query));
                  exit;
            }
            $data = oci_fetch_array($query);
            $name = $data[1] . ' ' . $data[2] . ' ' . $data[3];
            print("<tr>");
            print("<td width='200'>$data[0]</td>");
            print("<td width='200'>$name</td>");
            print("<td width='200'>$data[4]</td>");
            print("<td width='200'>$data[5]</td>");
            print("</tr>");
            ?>

      </table>
      
      <br><br>
      <h2>Extra Curricular Activities</h2>

    <?php
      $query = "select name from does join social_work on (does.soid=social_work.soid) where roll_no = '$roll_no'";
      $query = oci_parse($con_str, $query);
      if (!oci_execute($query)) {
            print(oci_error($query));
            exit;
      }
      $sw = [];
      while ($data = oci_fetch_array($query)) {
            array_push($sw, $data[0]);
      }

      $ca = [];
      $query = "select name from interested_in join cultural_activities on (interested_in.cid=cultural_activities.cid) where roll_no = '$roll_no'";
      $query = oci_parse($con_str, $query);
      if (!oci_execute($query)) {
            print(oci_error($query));
            exit;
      }
      while ($data = oci_fetch_array($query)) {
            array_push($ca, $data[0]);
      }

      $sp = [];
      $query = "select name from plays join sports on (plays.spid=sports.spid) where roll_no = '$roll_no'";
      $query = oci_parse($con_str, $query);
      if (!oci_execute($query)) {
            print(oci_error($query));
            exit;
      }
      while ($data = oci_fetch_array($query)) {
            array_push($sp, $data[0]);
      }

      $at = [];
      $query = "select name from likes join art on (likes.aid=art.aid) where roll_no = '$roll_no'";
      $query = oci_parse($con_str, $query);
      if (!oci_execute($query)) {
            print(oci_error($query));
            exit;
      }
      while ($data = oci_fetch_array($query)) {
            array_push($at, $data[0]);
      }

      $lt = [];
      $query = "select name from takes_part_in join literary on (takes_part_in.lid=literary.lid) where roll_no = '$roll_no'";
      $query = oci_parse($con_str, $query);
      if (!oci_execute($query)) {
            print(oci_error($query));
            exit;
      }
      while ($data = oci_fetch_array($query)) {
            array_push($lt, $data[0]);
      }

      ?>
<br><br>
	  <table>
      <tr>
      <th width="200">Social Work</th>
      <th width="200">Sports</th>
      <th width="200">Arts</th>
      <th width="200">Cultural Activities</th>
	  <th width="200">Literary</th>
      </tr>
	  <?php

      $count = count($sw);
      if (count($ca) > $count) {
            $count = count($ca);
      }
      if (count($sp) > $count) {
            $count = count($sp);
      }
      if (count($at) > $count) {
            $count = count($at);
      }
      if (count($lt) > $count) {
            $count = count($lt);
      }
      for ($i = 0; $i < $count; ++$i) {
            print("<tr>");
            print("<td width='200'>$sw[$i]</td>");
            print("<td width='200'>$ca[$i]</td>");
            print("<td width='200'>$sp[$i]</td>");
            print("<td width='200'>$at[$i]</td>");
            print("<td width='200'>$lt[$i]</td>");
            print("</tr>");
      }
      ?>
      </table>
	  

</body>
</html>
