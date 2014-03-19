<?php
mysql_connect("localhost","root","");
$id =$_REQUEST['ssn'];
@mysql_select_db("students_reg") or die( "Unable to select database");
mysql_query("DELETE FROM table_employee WHERE ssn = '$id'")
or die(mysql_error()); 

header("Location: del3.php");
?>