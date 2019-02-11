<!DOCTYPE html>
<html>
<style>
body {
    background-color: #fafafa;
    background-repeat: no-repeat;
	background-size: cover;
	
}
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    width: 100%;
    
}
select {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    width: 100%;
    
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
<?php
include("connection_str.php");
session_start();
$cat = $_SESSION['cat'];

if ($cat == 'social_work') {
    $catname = 'Social Work';
    $id = 'soid';
    $rel = 'does';
}

if ($cat == 'cultural_activities') {
    $catname = 'Cultural Activities';
    $id = 'cid';
    $rel = 'interested_in';
}

if ($cat == 'sports') {
    $catname = 'Sports';
    $id = 'spid';
    $rel = 'plays';
}

if ($cat == 'art') {
    $catname = 'Art';
    $id = 'aid';
    $rel = 'likes';
}

if ($cat == 'literary') {
    $catname = 'Literary';
    $id = 'lid';
    $rel = 'takes_part_in';
}

print("<h1>$catname</h1>");
?>
	
	<hr><br><br>
	<form class="modal-content animate" action="catInfo.php" method="post">
	  
	  <table>
	<tr>
	<th width="200"><label for="in"><b>Information</b></label></th>
	<th width="200"><select name="in" >
    <?php
    $filter = $_POST['in'];
    if ($filter && ($filter != 'all')) {
        $query = "select name from $cat where $id = '$filter'";
        $query = oci_parse($con_str, $query);

        if (!oci_execute($query)) {
            print(oci_error($query));
            exit;
        }
        $op = oci_fetch_array($query);

        print("<option value='$filter'>$op[0]</option>");
    } else {
        print("<option value='all'>All</option>");
    }
    $query = "select * from $cat";
    $query_str = oci_parse($con_str, $query);

    if (!oci_execute($query_str)) {
        print(oci_error($query_str));
        exit;
    }
    while ($data = oci_fetch_array($query_str)) {
        if ($filter && ($data[0] == $filter)) {
            print("<option value='all'>All</option>");
        } else {
            print("<option value='$data[0]'>$data[1]</option>");
        }
    }
    ?>
      </select></th>
	<th width="200"><button type="submit" class="signupbtn" value="submit" name="submit"">Filter</button></th>
	
	</tr>
	</table>
  </form>

<br><br>
<center>
	  <table>
      <tr>
      <th width="250">Roll no</th>
      <th width="250">Name</th>
      <th width="250">Activity</th>
      </tr>
	  
      <?php

        if (!$filter || $filter == 'all') {
            $query = "select student.roll_no, student.fname, student.mname, student.lname, $cat.name from student join $rel on (student.roll_no = $rel.roll_no) join $cat on ($rel.$id = $cat.$id)";
        } else {
            $query = "select student.roll_no, student.fname, student.mname, student.lname, $cat.name from student join $rel on (student.roll_no = $rel.roll_no) join $cat on ($rel.$id = $cat.$id) where $id = '$filter'";
        }
        $query_str = oci_parse($con_str, $query);

        if (!oci_execute($query_str)) {
            print(oci_error($query_str));
            exit;
        }
        while ($data = oci_fetch_array($query_str)) {

            $name = $data[1] . ' ' . $data[2] . ' ' . $data[3];
            $roll_no = $data[0];
            $activity = $data[4];
            print("<tr>");
            print("<td width='250'>$roll_no</td>");
            print("<td width='250'>$name</td>");
            print("<td width='250'>$activity</td>");
            print("</tr>");
        }


        ?>
	  
      </table></center>
	  

</body>
</html>
