<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');


$con = mysql_connect("localhost","root","");
$check = mysql_query("SELECT * FROM mysql.user where User='".$_SESSION["username"]."'");
$a=mysql_fetch_array($check);
if($a['Insert_priv']=='N')
{
  echo "<center><br/><br/>You do not have sufficient privileges to perform this operation.</center>";
  exit();
}
}

?>

<link href="border_shadows.css" rel="stylesheet" type="text/css" />
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


<!DOCTYPE html>
<html>
<body >

<title>Hostel Database Main Page</title>
<h1 align="center" >Hostel's Database</h1>


<script type="text/javascript">
    function showme(id) {
        var divid = document.getElementById(id);
        if (divid.style.display == 'block') divid.style.display = 'none';
        else divid.style.display = 'block';
    }
</script>
<p align="center">Welcome <b><?php echo $_SESSION['username']; ?></b></p>
<h2 align="center" ><a href="logout.php">Logout</a></h2>
<table width="1000" border="0" align="center" >
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


<tr>
<td>
<h3 align="">INSERT DATA IN TABLE</h3>
<a onclick="showme('insert_table');" href="#"><input class="button" type="button" name="Insert Data" value="Insert Data" /></a>

<div id="insert_table" style="display:none;">
<?php
$con = mysql_connect("localhost","root","");
$check = mysql_query("SELECT * FROM mysql.user where User='".$_SESSION["username"]."'");
$a=mysql_fetch_array($check);

if($a['Insert_priv']=='N')
{
  echo "<center><br/><br/>You do not have sufficient privileges to perform this operation.</center>";
  
}
  else
{
?>
<table width="1000" border="2" align="left" >
<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('widget');" href="#">Student</a>
<div id="widget" style="display:none;">
<b> <center> Enter the students's details </center></b>
<form method="post" action="php_form.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">First Name:<br/>
			<input type="text" name="first" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Last Name:<br/>
			<input type="text" name="last" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Mobile number:<br/>
			<input type="text" name="mobile" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Roll number:<br/>
			<input type="text" name="rollnum" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room number:<br/>
			<input type="text" name="roomnum" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Address:<br/>
			<input type="text" name="address" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>


<td width="144" bordercolor="#000033" bgcolor="#ADC2FF">
<a onclick="showme('widget2');" href="#">Employee</a>
<div id="widget2" style="display:none;">
<b> <center> Enter the employee's details </center></b>
<form method="post" action="php_form2.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Fname:<br/>
			<input type="text" name="first" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Lname:<br/>
			<input type="text" name="last" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">ID NO:<br/>
			<input type="text" name="ssn" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">DOB:<br/>
			<input type="text" name="dob" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">DO joining:<br/>
			<input type="text" name="doj" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Address:<br/>
			<input type="text" name="address" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Phone number:<br/>
			<input type="text" name="mobile" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Department number:<br/>
			<input type="text" name="dno" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>



<td width="144" bordercolor="#000033" bgcolor="#ADC2FF">
<a onclick="showme('widget3');" href="#">Room</a>
<div id="widget3" style="display:none;">
<b> <center> Enter the room's details </center></b>
<form method="post" action="php_form3.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room number:<br/>
			<input type="text" name="roomnum" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Type:<br/>
			<input type="text" name="type" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">No of beds:<br/>
			<input type="text" name="nob" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">No of tables:<br/>
			<input type="text" name="not" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">No of chairs:<br/>
			<input type="text" name="noc" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>



<td width="144" bordercolor="#000033" bgcolor="#ADC2FF">
<a onclick="showme('widget4');" href="#">Department</a>
<div id="widget4" style="display:none;">
<b> <center> Enter the departments's details </center></b>
<form method="post" action="php_form4.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Department number:<br/>
			<input type="text" name="dnum" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Department name:<br/>
			<input type="text" name="dname" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">No of workers:<br/>
			<input type="text" name="now" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>



<td width="144" bordercolor="#000033" bgcolor="#ADC2FF">
<a onclick="showme('widget5');" href="#">Complaint</a>
<div id="widget5" style="display:none;">
<b> <center> Enter the complaints's details </center></b>
<form method="post" action="php_form5.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Complaint number:<br/>
			<input type="text" name="complaint" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room number:<br/>
			<input type="text" name="rn" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Detail :<br/>
			<input type="text" name="d" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of complaint:<br/>
			<input type="text" name="dc" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of issue resolve:<br/>
			<input type="text" name="dr" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>



<td width="144" bordercolor="#000033" bgcolor="#ADC2FF">
<a onclick="showme('widget7');" href="#">Store-Room</a>
<div id="widget7" style="display:none;">
<b> <center> Enter store-room's details </center></b>
<form method="post" action="php_form7.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room number:<br/>
			<input type="text" name="rn" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Item :<br/>
			<input type="text" name="it" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Quantity<br/>
			<input type="text" name="qt" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>



<td width="144" bordercolor="#000033" bgcolor="	#ADC2FF">
<a onclick="showme('widget6');" href="#">Maintenance</a>
<div id="widget6" style="display:none;">
<b> <center> Enter the complaints's details </center></b>
<form method="post" action="php_form6.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Item name:<br/>
			<input type="text" name="i" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of maintenance:<br/>
			<input type="text" name="d" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Details :<br/>
			<input type="text" name="de" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Bill number:<br/>
			<input type="text" name="b" /></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>
</tr>
</table>
</div>
</td>
</tr>




<tr>
<td>
<h3 align="" > VIEW & UPDATE DATA</h3>
<a onclick="showme('vet');" href="#"><input class="button" type="button" name="View & Upadate Data" value="View & Update Data" /></a>
<div id="vet" style="display:none;">
<?php

}
$con = mysql_connect("localhost","root","");
$check = mysql_query("SELECT * FROM mysql.user where User='".$_SESSION["username"]."'");
$a=mysql_fetch_array($check);

if($a['Select_priv']=='N')
{
  echo "<center><br/><br/>You do not have sufficient privileges to perform this operation.</center>";
}
  else
{


?>


<table width="200" border="2" align="bottom" >

<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('w2');" href="#">view student's details</a>
<div id="w2" style="display:none;">
<form method="post" action="lol2.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">First Name:
			<input type="checkbox" onclick="checkIt(this);" name="fn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Last Name:
			<input type="checkbox" onclick="checkIt(this);" name="ln" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Mobile Number:
			<input type="checkbox" onclick="checkIt(this);" name="mn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Roll Number:
		<input type="checkbox" onclick="checkIt(this);" name="rn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room Number:
		<input type="checkbox" onclick="checkIt(this);" name="ron" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Address:
		<input type="checkbox" onclick="checkIt(this);" name="ad" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>

</div>
</td>
</tr>

<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('w3');" href="#">View employee's detail</a>
<div id="w3" style="display:none;">
<form method="post" action="lol3.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">First Name:
			<input type="checkbox" onclick="checkIt(this);" name="fn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Last Name:
			<input type="checkbox" onclick="checkIt(this);" name="ln" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">SSNumber:
			<input type="checkbox" onclick="checkIt(this);" name="ssn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of Birth:
		<input type="checkbox" onclick="checkIt(this);" name="dob" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of Joining:
		<input type="checkbox" onclick="checkIt(this);" name="doj" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Address:
		<input type="checkbox" onclick="checkIt(this);" name="ad" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Phone Number:
		<input type="checkbox" onclick="checkIt(this);" name="pn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Department Number:
		<input type="checkbox" onclick="checkIt(this);" name="dn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>

</div>
</td>
</tr>


<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('w1');" href="#">View room's detail</a>
<div id="w1" style="display:none;">
<form method="post" action="lol.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room number:
			<input type="checkbox" onclick="checkIt(this);" name="r" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">type:
			<input type="checkbox" onclick="checkIt(this);" name="t" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">no of beds:
			<input type="checkbox" onclick="checkIt(this);" name="nob" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">no of tables:
		<input type="checkbox" onclick="checkIt(this);" name="not" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">no of chairs:
		<input type="checkbox" onclick="checkIt(this);" name="noc" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>
</tr>

<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('w4');" href="#">View Maintenance's detail</a>
<div id="w4" style="display:none;">
<form method="post" action="lol4.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Item:
			<input type="checkbox" onclick="checkIt(this);" name="fn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date Of Maintenance:
			<input type="checkbox" onclick="checkIt(this);" name="ln" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Problem:
			<input type="checkbox" onclick="checkIt(this);" name="ssn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Billnumber:
		<input type="checkbox" onclick="checkIt(this);" name="dob" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>
</tr>


<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('w5');" href="#">View Department's detail</a>
<div id="w5" style="display:none;">
<form method="post" action="lol5.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Department Name:
			<input type="checkbox" onclick="checkIt(this);" name="fn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Department Number:
			<input type="checkbox" onclick="checkIt(this);" name="ln" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">No Of Workers:
			<input type="checkbox" onclick="checkIt(this);" name="ssn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>
</tr>


<tr>
<td width="144" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('w6');" href="#">View Complaints's detail</a>
<div id="w6" style="display:none;">
<form method="post" action="lol6.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Complaint Number:
			<input type="checkbox" onclick="checkIt(this);" name="cn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room Number:
			<input type="checkbox" onclick="checkIt(this);" name="fn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Detail:
			<input type="checkbox" onclick="checkIt(this);" name="ln" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of Complaint:
			<input type="checkbox" onclick="checkIt(this);" name="ssn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Date of issue resolve:
			<input type="checkbox" onclick="checkIt(this);" name="mn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</form>
</div>
</td>
</tr>

<tr>
<td width="144" bordercolor="#000033" bgcolor="#ADC2FF">
<a onclick="showme('w7');" href="#">View store-room's detail</a>
<div id="w7" style="display:none;">
<b> <center> View store-room's details </center></b>
<form method="post" action="lol7.php">
<table width="200" border="2" align="center">
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Room number:
			<input type="checkbox" onclick="checkIt(this);" name="cn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Item Name:
			<input type="checkbox" onclick="checkIt(this);" name="fn" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF">Quantity:
			<input type="checkbox" onclick="checkIt(this);" name="ln" value="checked" id="check' +str_idnum + '"/><br></td>
	</tr>
	<tr>
		<td width="144" bordercolor="#000033" bgcolor="#85A3FF"><div align="center"><input type="submit" name="submit" value="submit" /></div></td>
	</tr>
</table>
</table>
</form>
</div>
</td>
</tr>


<tr>
<td>
<h3 align="">DELTE DATA FROM TABLE</h3>
<a onclick="showme('delete_table');" href="#"><input class="button" type="button" name="Insert Data" value="Delete Data" /></a>
<div id="delete_table" style="display:none;">

<?php

}
$con = mysql_connect("localhost","root","");
$check = mysql_query("SELECT * FROM mysql.user where User='".$_SESSION["username"]."'");
$a=mysql_fetch_array($check);

if($a['Delete_priv']=='N')
{
  echo "<center><br/><br/>You do not have sufficient privileges to perform this operation.</center>";
}
  else
{
?>


<table width="1000" border="" align="left" >
<tr>
<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d1');" href="del2.php">Student's detail</a>
<div id="d1" style="display:none;">
</div>
</td>

<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d2');" href="del3.php">Employee's detail</a>
<div id="d2" style="display:none;">
</div>
</td>

<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d3');" href="del.php">Room's detail</a>
<div id="d3" style="display:none;">
</div>
</td>

<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d4');" href="del5.php">Department's detail</a>
<div id="d4" style="display:none;">
</div>
</td>

<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d5');" href="del6.php">Complaint's detail</a>
<div id="d5" style="display:none;">
</div>
</td>

<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d6');" href="del4.php">Maintenance's detail</a>
<div id="d6" style="display:none;">
</div>
</td>

<td width="200" bordercolor="#F00000" bgcolor="#ADC2FF">
<a onclick="showme('d7');" href="del7.php">Store-Room's detail</a>
<div id="d7" style="display:none;">
</div>
</td>

</tr>
</table>
</div>
<?php

}
?>


<tr>
<td>
<h3 align="">Grant Permission</h3>
<a onclick="showme('g1');" href="#"><input class="button" type="button" name="Insert Data" value="Grant" /></a>
<div id="g1" style="display:none;">
<?php

$con = mysql_connect("localhost","root","");
$check = mysql_query("SELECT * FROM mysql.user where User='".$_SESSION["username"]."'");
$a=mysql_fetch_array($check);

if($a['Grant_priv']=='N')
{
  echo "<center><br/><br/>You do not have sufficient privileges to perform this operation.</center>";
}
  else
{
$con = mysql_connect("localhost","root","");
mysql_select_db("student_reg", $con);
$query = mysql_query("SELECT DISTINCT User FROM mysql.user where User<>\"root\" and User<>\"".$_SESSION["username"]."\"");
echo "<br/><br/><br/><br/><form id=\"form1\" action=\"g.php?st=grant\" method='POST' onsubmit=validateForm()>";
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


mysql_close($con);
}

?>
</div>
</td>
</tr>


<tr>
<td>
<h3 align="">Extra query</h3>
<a onclick="showme('q1');" href="#"><input class="button" type="button" name="Query" value="Query" /></a>
<div id="q1" style="display:none;">
Coresponding to room's present in room table, names of student will get print.
<a href="q.php">Click here</a>
</div>
</td>
</tr>


</div>
</td>
</tr>
</table>


</html>
</body>

