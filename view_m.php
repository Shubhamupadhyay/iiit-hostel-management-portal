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
$id =$_REQUEST['ssn'];
$result = mysql_query("SELECT * FROM table_maintain WHERE billnum= '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$test['item'] ;
				$ln= $test['dom'] ;					
				$rn=$test['problem'] ;
				$mn=$test['billnum'] ;
				
if(isset($_POST['save']))
{	
	$fn_save = $_POST['fn'];
	$ln_save = $_POST['ln'];
	$rn_save = $_POST['rn'];
	$mn_save = $_POST['mn'];
	mysql_query("UPDATE table_maintain SET item ='$fn_save', dom ='$ln_save',
		 problem ='$rn_save',billnum ='$mn_save' WHERE billnum = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	header("Location: lol4.php");			
}
mysql_close();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<center>
<form method="post">
<table>
	<tr>
		<td>Item</td>
		<td><input type="text" name="fn" value="<?php echo $fn ?>"/></td>
	</tr>
	<tr>
		<td>Date of Maintenance</td>
		<td><input type="text" name="ln" value="<?php echo $ln ?>"/></td>
	</tr>
	<tr>
		<td>Problem</td>
		<td><input type="text" name="rn" value="<?php echo $rn ?>"/></td>
	</tr>
	<tr>
		<td>Bill Number</td>
		<td><input type="text" name="mn" value="<?php echo $mn ?>"/></td>
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
