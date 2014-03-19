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
if (!$id) 
		{
		die("Error: Data not found..");
		}
$result = mysql_query("SELECT * FROM table_storeroom WHERE item = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$test['roomnum'] ;
				$ln= $test['item'] ;					
				$rn=$test['quantity'] ;

if(isset($_POST['save']))
{	
	$fn_save = $_POST['fn'];
	$ln_save = $_POST['ln'];
	$rn_save = $_POST['rn'];
	mysql_query("UPDATE table_storeroom SET roomnum ='$fn_save', item ='$ln_save',
		 quantity ='$rn_save' WHERE item = '$id' ")
				or die(mysql_error());
	echo "Saved!";
	
	header("Location: main.php");			
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
		<td>Room:</td>
		<td><input type="text" name="fn" value="<?php echo $fn ?>"/></td>
	</tr>
	<tr>
		<td>Type</td>
		<td><input type="text" name="ln" value="<?php echo $ln ?>"/></td>
	</tr>
	<tr>
		<td>No of Beds</td>
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
