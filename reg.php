<script type="text/javascript" src="alert.js"></script>
<link href="login-box.css" rel="stylesheet" type="text/css" />
<title>Register</title>
<script>
function validateForm()
{
var x=document.forms["regform"]["username"].value;
var y=document.forms["regform"]["password"].value;
var z=document.forms["regform"]["password2"].value;
if (x==null || x=="" || y==null || y=="" || z==null || z=="")
  {
  alert("Required (*) field empty!");
  return false;
  }
if (y!=z)
{
  alert("Passwords do not match!");
  return false;
}
 }
</script>


<style>
{ margin: 0; padding:0;}
html {
		background: url(3.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
}
</style>


<?php
//  echo "<head>";
// echo "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">";
//  echo "</head>";
//  include "header2.php"; 
 if(!isset($_GET["st"]))
  {
    if(isset($_GET["msg"]))
		echo "<script>showalert(\"".$_GET["msg"]."\");</script>";
	echo "<div align=\"left\" style=\"padding: 100px 0 0 250px\">";
	echo "<div id=\"login-box\">";
	echo "<H2>Register</H2>";
	echo"<table border=\"0\" align=\"center\" width=\"400\">";
    echo "<center><form action=\"reg.php?st=reg\" method=\"POST\" id=\"regform\" onsubmit=\"return validateForm()\">\n";
    echo "<tr><td>Username: </td><td><input name=\"username\" MAXLENGTH=\"16\">*</td></tr><br />\n";
    echo "<tr><td>Password: </td><td><input type=\"password\" name=\"password\" MAXLENGTH=\"16\">*</td></tr><br />\n";
    echo "<tr><td>Re-type Password: </td><td><input type=\"password\" name=\"password2\" MAXLENGTH=\"16\">*</td></tr><br />\n";
    echo "<tr><td></td><td><input type=\"submit\" value=\"Register\" class=\"button\">\n</td></tr>";
    echo "</form></center>\n";
	echo "</div>";
	echo "</div>";

  }
  
  
  else if($_GET["st"]=="reg")
  {
    $con = mysql_connect("localhost","root","");
    $q="SELECT * FROM mysql.user WHERE User=\"".$_POST["username"]."\"";
   	echo $q;
    $res=mysql_query($q);
    $num=mysql_num_rows($res);
    if((int)$num>0)
    { 
      $msg="Error! Username already exists in database!";
      Header("Location:reg.php?msg=$msg");
    }	
    else
    {
    $q="GRANT ALL PRIVILEGES ON *.* TO ".$_POST["username"]."@'localhost' IDENTIFIED BY \"".$_POST["password"]."\"";
    mysql_query($q);
    echo $q;
    $q="REVOKE DELETE,UPDATE,CREATE ON *.* FROM ".$_POST["username"]."@'localhost'";
    mysql_query($q);
    echo $q;
    $msg="Registeraion successful!";

    Header("Location:login.php?msg=$msg");
    mysql_close($con);
  }
  }
  
?>l