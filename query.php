<?php
include("connection_str.php");

print("<BR>");

$query = $_POST["query"];
$query_str=oci_parse($con_str,$query);

print("<BR>");

if(!oci_execute($query_str))
{
    print(oci_error($query_str));
    exit;
}
while($data=oci_fetch_array($query_str))
{
    print("$data[0], $data[1], $data[2], $data[3], $data[4], $data[5],$data[6], $data[7], $data[8], $data[9]<BR>");
}

?>