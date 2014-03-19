<?php
mysql_connect("localhost","root","");
$id =$_REQUEST['ssn'];
@mysql_select_db("students_reg") or die( "Unable to select database");
mysql_query("DELETE FROM table_department WHERE dno = '$id'")
or die(mysql_error()); 
header("Location: del5.php");
?>