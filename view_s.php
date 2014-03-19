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
<link href="border_shadows.css" rel="stylesheet" type="text/css" />
<?php
mysql_connect("localhost","root","");
@mysql_select_db("students_reg") or die( "Unable to select database");
$id =$_REQUEST['rollnum'];

$result = mysql_query("SELECT * FROM table_student WHERE rollnum = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$test['f_name'] ;
				$ln= $test['l_name'] ;					
				$sd=$test['student_id'] ;
				$rn=$test['rollnum'] ;
				$mn=$test['mobile'] ;
				$ad=$test['address'] ;
				$rm=$test['roomnum'] ;

if(isset($_POST['save']))
{	
	$fn_save = $_POST['fn'];
	$ln_save = $_POST['ln'];
	$rn_save = $_POST['rn'];
	$mn_save = $_POST['mn'];
	$ad_save = $_POST['ad'];
	$rm_save = $_POST['rm'];
	mysql_query("UPDATE table_student SET f_name ='$fn_save', l_name ='$ln_save',
		 rollnum ='$rn_save',mobile ='$mn_save',address='$ad_save' , roomnum = '$rm_save' WHERE rollnum = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: main.php");			
}
mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<center>
<form method="post">
<table>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="fn" value="<?php echo $fn ?>"/></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="ln" value="<?php echo $ln ?>"/></td>
	</tr>
	<tr>
		<td>Roll Number:</td>
		<td><input type="text" name="rn" value="<?php echo $rn ?>"/></td>
	</tr>
	<tr>
		<td>Mobile umber:</td>
		<td><input type="text" name="mn" value="<?php echo $mn ?>"/></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td><input type="text" name="ad" value="<?php echo $ad ?>"/></td>
	</tr>
	
	<tr>
		<td>Room Number:</td>
		<td><input type="text" name="rm" value="<?php echo $rm ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>
</form>
</center>
</body>
</html>
