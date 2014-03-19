<?php
session_start();
$con = mysql_connect("localhost","root","");
mysql_select_db("student_reg", $con);
$query = mysql_query("SELECT DISTINCT User FROM mysql.user where User<>\"root\" and User<>\"".$_SESSION["username"]."\"");
$value=$_POST['grant'];
  $n=count($value);
  $q="GRANT ALL ON *.* TO ".$_POST["user"]."@'localhost'";
  echo $q;
  echo "n= " ;
	echo $n;
  mysql_query($q);
  $q="REVOKE INSERT,UPDATE,DELETE,VIEW,GRANT OPTION ON *.* FROM ".$_POST["user"]."@'localhost'";
  echo $q;
  mysql_query($q);
  for($i=0 ; $i<$n ; $i++)
  {
    $ans = isset($_POST['grantoption']) && $_POST['grantoption']  ? "1" : "0";
    if($ans)
      $q="GRANT ".$value[$i]." ON *.* TO ".$_POST["user"]."@'localhost' WITH GRANT OPTION";
    else
      $q="GRANT ".$value[$i]." ON *.* TO ".$_POST["user"]."@'localhost'";
    //echo $q;
    mysql_query($q);
  }
  $msg="Permissions changed successfully!";
  Header("Location:main.php?msg=$msg");
?>