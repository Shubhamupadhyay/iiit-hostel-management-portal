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

$id =$_REQUEST['roomno'];
echo $id; 
if (!$id) 
		{
		
		die("Error: Data not found..");
		}
$result = mysql_query("SELECT * FROM room WHERE roomno = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$test['roomno'] ;
				$ln= $test['type'] ;					
				$rn=$test['nob'] ;
				$mn=$test['noc'] ;
				$ad=$test['tables'] ;

if(isset($_POST['save']))
{	
	$fn_save = $_POST['fn'];
	$ln_save = $_POST['ln'];
	$rn_save = $_POST['rn'];
	$mn_save = $_POST['mn'];
	$ad_save = $_POST['ad'];
	mysql_query("UPDATE room SET roomno ='$fn_save', type ='$ln_save',
		 nob ='$rn_save',noc ='$mn_save',tables='$ad_save' WHERE roomno = '$id' ")
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
		<td>No of Chairs</td>
		<td><input type="text" name="mn" value="<?php echo $mn ?>"/></td>
	</tr>
	<tr>
		<td>No of Tables</td>
		<td><input type="text" name="ad" value="<?php echo $ad ?>"/></td>
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
