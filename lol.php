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
<h2 align="center">Room's details</h2>
<?php
mysql_connect("localhost","root","");
@mysql_select_db("students_reg") or die( "Unable to select database");
$query="SELECT * FROM student";
$result=mysql_query($query);
$num=mysql_numrows($result);
?>
<table border="0" cellspacing="4" cellpadding="2" align="center">
<tr>
<td><font face="Arial, Helvetica, sans-serif"> <?php echo "Sr.no" ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo "Room number"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif">echo "Name"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['nob'])){ echo "No Of Beds"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['noc'])){ echo "No Of Chairs"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['not'])){ echo "No Of Tables"; }?></font></td>
</tr>

<?php
$i=0;
while ($i < $num) {
$f1=mysql_result($result,$i,"roomno");
$f2=mysql_result($result,$i,"type");
$f3=mysql_result($result,$i,"nob");
$f4=mysql_result($result,$i,"noc");
$f5=mysql_result($result,$i,"tables");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i+1 ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['r'])) { echo $f1 ; } ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['t'])) { echo $f2;  }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['nob'])) {echo $f3; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['noc'])) {echo $f4; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['not'])) {echo $f5; }?></font></td>
<?php				
	echo"<td> <a href ='view_r.php? roomno=$f1'>Edit</a>";
//	echo"<td> <a href ='del_r.php?roomno=$f1'><center>Delete</center></a>"; ?>
</tr>
<?php
$i++;
}
?>
</body>
</html>