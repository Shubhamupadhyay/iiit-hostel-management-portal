<?php
mysql_connect("localhost","root","");
$id =$_REQUEST['rollnum'];
@mysql_select_db("students_reg") or die( "Unable to select database");
mysql_query("DELETE FROM table_student WHERE rollnum = '$id'")
or die(mysql_error()); 

header("Location: del2.php");
?>