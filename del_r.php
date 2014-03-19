<?php
mysql_connect("localhost","root","");
$id =$_REQUEST['roomno'];
@mysql_select_db("students_reg") or die( "Unable to select database");
mysql_query("DELETE FROM room WHERE roomno = '$id'")
or die(mysql_error()); 
header("Location: del.php");
?>