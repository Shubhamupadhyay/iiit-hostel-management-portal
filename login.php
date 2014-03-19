<html>
<body>
<title>Hostel Database Login Page</title>


	<script type="text/javascript" src="alert.js"></script>
<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>


<script>
function validateForm()
{
  var x=document.forms["logform"]["username"].value;
  var y=document.forms["logform"]["password"].value;
  if (x==null || x=="" || y==null || y=="")
  {
   alert("Required (*) field empty!");
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
  session_start();
  echo "<head>";
  echo "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">";
  echo "</head>";
//  include "header2.php";
//  include "header2.php";
if(isset($_SESSION["valid_username"]))
    Header("Location: main.php");

if(!isset($_GET["st"]))
  {
  if(isset($_GET["msg"]))
	
    echo "<script>showalert(\"".$_GET["msg"]."\");</script>";
	echo "<div align=\"left\" style=\"padding: 100px 0 0 250px\">";
	echo "<div id=\"login-box\">";
	echo "<H2>Login</H2>";

	echo"<table border=\"0\" align=\"center\" width=\"400\">";
	echo "<form action=\"?st=login\" method=\"POST\" id=\"logform\" onsubmit=\"return validateForm()\">";
	echo "<tr><td></td><td><h3>User Login</h3></td></tr>";
	echo "<tr><td>Username:</td><td> <input name=\"username\" class=\"form-login\" size=\"16\">*</td></tr><br />";
	echo "<tr><td>Password:</td> <td><input type=\"password\" class=\"form-login\" name=\"password\" size=\"16\">*</td></tr><br />";
	echo "<tr><td></td><td><input type=\"submit\" value=\"Login\" class=\"button\"></td></tr>";
	echo "</form>";
	echo "<tr><td><a href=\"reg.php\">Register</a></td></tr>";
	echo "</table>";
	echo "</div>";
	echo "</div>";

	}  

  
else if ($_GET["st"] == "login")
  {
    $pass=$_POST["password"];
    $ms = mysql_connect("localhost", $_POST["username"], $pass) ;
    if (!$ms )
    {
      $msg="Invalid username or password. Click Register to register as a new user";
      Header("Location:login.php?msg=$msg");
    }
    else
    {
    mysql_select_db("emall",$ms);
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    Header("Location: main.php");
    }
    }

?>

</html>
</body>
