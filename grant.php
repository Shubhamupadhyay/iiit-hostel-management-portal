<script type="text/javascript" src="alert.js"></script>
<script>
function validateForm()
{
var x=document.forms["form1"]["user"].value;

if (x==null || x=="")
  {
  alert("Please select a user first!");
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
//echo "<head>";
//echo "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">";
//echo "</head>";

//include "header.php";
$con = mysql_connect("localhost","root","");
/*if (!isset($msg) && !$con)
{
  die "Could not connect: ".mysql_error();
}

else*/ if(isset($_GET["msg"]))
    echo "<script>showalert(\"".$_GET["msg"]."\");</script>";
session_start();
mysql_select_db("student_reg", $con);

$query = mysql_query("SELECT DISTINCT User FROM mysql.user where User<>\"root\" and User<>\"".$_SESSION["username"]."\"");
$check = mysql_query("SELECT * FROM mysql.user where User='".$_SESSION["username"]."'");
$a=mysql_fetch_array($check);

if($a['Grant_priv']=='N')
  echo "<center><br/><br/>You do not have sufficient privileges to perform this operation.</center>";

else if(!isset($_GET['st']))
{
echo "<br/><br/><br/><br/><form id=\"form1\" action=\"grant.php?st=grant\" method='POST' onsubmit=validateForm()>";
echo "<center><table><tr><td colspan=5 style=\"align:center\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name='user'><option value=''>--Select User--</option><br/>";

while($row = mysql_fetch_array($query))
{
  echo "<option value='".$row["User"]."'>".$row["User"]."</option>";
}
echo "</select></td></tr>";
echo "<tr><td><input type=\"checkbox\" name=\"grant[]\" value=\"INSERT\">Insert</td>";
echo "<td><input type=\"checkbox\" name=\"grant[]\" value=\"UPDATE\">Update</td>";
echo "<td><input type=\"checkbox\" name=\"grant[]\" value=\"DELETE\">Delete</td>";
echo "<td><input type=\"checkbox\" name=\"grant[]\" value=\"Select\">View</td>";
echo "<td><input type=\"checkbox\" name=\"grantoption\" value=\"1\">Grant</td>";
echo "</tr></table>";
echo "<br/><br/><input type=\"submit\" class=\"button\" value=\"Set Priviliges\"/></center>";
}

else
{
  $value=$_POST['grant'];
  $n=count($value);
  $q="GRANT ALL ON *.* TO ".$_POST["user"]."@'localhost'";
  //echo $q;
  mysql_query($q);
  $q="REVOKE INSERT,UPDATE,DELETE,VIEW,GRANT OPTION ON *.* FROM ".$_POST["user"]."@'localhost'";
  //echo $q;
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
  Header("Location:grant.php?msg=$msg");
}

mysql_close($con);
?>
