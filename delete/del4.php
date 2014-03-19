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


<h2 align="center">Employee's details</h2>
<?php
mysql_connect("localhost","root","");
@mysql_select_db("students_reg") or die( "Unable to select database");
$query="SELECT * FROM table_maintain";
$result=mysql_query($query);
$num=mysql_numrows($result);
?>
<table border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
<td><font face="Arial, Helvetica, sans-serif"> <?php echo "Sr.no" ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php  echo "Item"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php  echo "Date Of Maintenance"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php  echo "Problem"; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php  echo "Bill Number"; ?></font></td>
</tr>

<?php
$i=0;
while ($i < $num) {
$f1=mysql_result($result,$i,"item");
$f2=mysql_result($result,$i,"dom");
$f3=mysql_result($result,$i,"problem");
$f4=mysql_result($result,$i,"billnum");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i+1 ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f1 ;  ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f2;  ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
<?php				
	echo"<td> <a href ='view_m.php? ssn=$f4'>Edit</a>";
	echo"<td> <a href ='del_m.php?	ssn=$f4'><center>Delete</center></a>"; ?>
</tr>
<?php
$i++;
}
?>
</body>
</html>