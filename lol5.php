<html>
<body>
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
<h2 align="center">Department's details</h2>
<?php
mysql_connect("localhost","root","");
@mysql_select_db("students_reg") or die( "Unable to select database");
$query="SELECT * FROM table_department";
$result=mysql_query($query);
$num=mysql_numrows($result);
?>
<table border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
<td><font face="Arial, Helvetica, sans-serif"> <?php echo "Sr.no" ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['fn'])){ echo "Department Name"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ln'])){ echo "Department Number"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ssn'])){ echo "No Of Workers"; }?></font></td>
</tr>

<?php
$i=0;
while ($i < $num) {
$f1=mysql_result($result,$i,"dname");
$f2=mysql_result($result,$i,"dno");
$f3=mysql_result($result,$i,"no_of_workers");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i+1 ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['fn'])) { echo $f2 ; } ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ln'])) { echo $f1;  }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ssn'])) {echo $f3; }?></font></td>
<?php				
	echo"<td> <a href ='view_d.php? ssn=$f2'>Edit</a>";
//	echo"<td> <a href ='del_d.php?	ssn=$f2'><center>Delete</center></a>"; ?>
</tr>
<?php
$i++;
}
?>
</body>
</html>