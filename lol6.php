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
<h2 align="center">Complaint's details</h2>
<?php
mysql_connect("localhost","root","");
@mysql_select_db("students_reg") or die( "Unable to select database");
$query="SELECT * FROM complaint";
$result=mysql_query($query);
$num=mysql_numrows($result);
?>
<table border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
<td><font face="Arial, Helvetica, sans-serif"> <?php echo "Sr.no" ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['cn'])){ echo "Complaint Number"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['fn'])){ echo "Room"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ln'])){ echo "Detail"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ssn'])){ echo "Date Of C"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['mn'])){ echo "Date Of R"; }?></font></td>
</tr>

<?php
$i=0;
while ($i < $num) {
$f1=mysql_result($result,$i,"c_roomnum");
$f2=mysql_result($result,$i,"detail");
$f3=mysql_result($result,$i,"d_of_c");
$f4=mysql_result($result,$i,"complaint_num");
$f5=mysql_result($result,$i,"d_of_r");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i+1 ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['cn'])) { echo $f4 ; } ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['fn'])) { echo $f1 ; } ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ln'])) { echo $f2;  }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ssn'])) {echo $f3; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['mn'])) {echo $f5; }?></font></td>
<?php				
	echo"<td> <a href ='view_c.php? ssn=$f4'>Edit</a>";
//	echo"<td> <a href ='del_c.php?	ssn=$f4'><center>Delete</center></a>"; ?>
</tr>
<?php
$i++;
}
?>
</body>
</html>