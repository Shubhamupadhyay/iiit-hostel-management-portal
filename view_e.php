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

$result = mysql_query("SELECT * FROM table_employee WHERE ssn= '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$test['f_name'] ;
				$ln= $test['l_name'] ;					
				$rn=$test['ssn'] ;
				$mn=$test['dob'] ;
				$ad=$test['doj'] ;
				$rm=$test['address'] ;
				$pq=$test['mobile'] ;
				$rs=$test['dno'] ;

if(isset($_POST['save']))
{	
	$fn_save = $_POST['fn'];
	$ln_save = $_POST['ln'];
	$rn_save = $_POST['rn'];
	$mn_save = $_POST['mn'];
	$ad_save = $_POST['ad'];
	$rm_save = $_POST['rm'];
	$pq_save = $_POST['pq'];
	$rs_save = $_POST['rs'];
	mysql_query("UPDATE table_employee SET f_name ='$fn_save', l_name ='$ln_save',
		 ssn ='$rn_save',dob ='$mn_save',doj='$ad_save' , address = '$rm_save' ,mobile='$pq_save',dno='$rs_save' WHERE ssn = '$id'")
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
		<td>First Name</td>
		<td><input type="text" name="fn" value="<?php echo $fn ?>"/></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="ln" value="<?php echo $ln ?>"/></td>
	</tr>
	<tr>
		<td>ID No</td>
		<td><input type="text" name="rn" value="<?php echo $rn ?>"/></td>
	</tr>
	<tr>
		<td>Date of Birth</td>
		<td><input type="text" name="mn" value="<?php echo $mn ?>"/></td>
	</tr>
	<tr>
		<td>Date of Joining</td>
		<td><input type="text" name="ad" value="<?php echo $ad ?>"/></td>
	</tr>
	
	<tr>
		<td>Address</td>
		<td><input type="text" name="rm" value="<?php echo $rm ?>"/></td>
	</tr>
	
	<tr>
		<td>mobile</td>
		<td><input type="text" name="pq" value="<?php echo $pq ?>"/></td>
	</tr>
	
	<tr>
		<td>D-number</td>
		<td><input type="text" name="rs" value="<?php echo $rs ?>"/></td>
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
