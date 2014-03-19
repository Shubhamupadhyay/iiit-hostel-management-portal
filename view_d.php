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
$result = mysql_query("SELECT * FROM table_department WHERE dno= '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$test['dname'] ;
				$ln= $test['dno'] ;					
				$rn=$test['no_of_workers'] ;
				
if(isset($_POST['save']))
{	
	$fn_save = $_POST['fn'];
	$ln_save = $_POST['ln'];
	$rn_save = $_POST['rn'];
	mysql_query("UPDATE table_department SET dname ='$fn_save', dno ='$ln_save',
		 no_of_workers ='$rn_save' WHERE dno = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	header("Location: main.php");			
}
mysql_close();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<center>
<form method="post">
<table>
	<tr>
		<td>Department Name:</td>
		<td><input type="text" name="fn" value="<?php echo $fn ?>"/></td>
	</tr>
	<tr>
		<td>Department Number</td>
		<td><input type="text" name="ln" value="<?php echo $ln	 ?>"/></td>
	</tr>
	<tr>
		<td>No Of Workers</td>
		<td><input type="text" name="rn" value="<?php echo $rn ?>"/></td>
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
