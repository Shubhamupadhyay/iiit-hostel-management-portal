<?php
mysql_connect("localhost","root","");
$id =$_REQUEST['ssn'];
@mysql_select_db("students_reg") or die( "Unable to select database");
mysql_query("DELETE FROM table_maintain WHERE billnum = '$id'")
or die(mysql_error()); 
header("Location: del4.php");
?>