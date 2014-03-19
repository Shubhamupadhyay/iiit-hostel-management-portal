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
<h2 align="center">Employee's details</h2>
<?php
mysql_connect("localhost","root","");
@mysql_select_db("students_reg") or die( "Unable to select database");
$query="SELECT * FROM table_employee";
$result=mysql_query($query);
$num=mysql_numrows($result);
?>
<table border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
<td><font face="Arial, Helvetica, sans-serif"> <?php echo "Sr.no" ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['fn'])){ echo "First Name"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ln'])){ echo "Last Name"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ssn'])){ echo "ID NO"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['dob'])){ echo "Date of Birth"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['doj'])){ echo "Date of Joining"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ad'])){ echo "Address"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['pn'])){ echo "Phone Number"; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['dn'])){ echo "Department Number"; }?></font></td>
</tr>

<?php
$i=0;
while ($i < $num) {
$f1=mysql_result($result,$i,"f_name");
$f2=mysql_result($result,$i,"l_name");
$f3=mysql_result($result,$i,"ssn");
$f4=mysql_result($result,$i,"dob");
$f5=mysql_result($result,$i,"doj");
$f6=mysql_result($result,$i,"address");
$f7=mysql_result($result,$i,"mobile");
$f8=mysql_result($result,$i,"dno");
?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $i+1 ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['fn'])) { echo $f1 ; } ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ln'])) { echo $f2;  }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ssn'])) {echo $f3; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['dob'])) {echo $f4; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['doj'])) {echo $f5; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['ad'])) {echo $f6; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['pn'])) {echo $f7; }?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php if(isset($_POST['dn'])) {echo $f8; }?></font></td>
<?php				
	echo"<td> <a href ='view_e.php? ssn=$f3'>Edit</a>";
//	echo"<td> <a href ='del_e.php?	ssn=$f3'><center>Delete</center></a>"; ?>
</tr>
<?php
$i++;
}
?>
</body>
</html>