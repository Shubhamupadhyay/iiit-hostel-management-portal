
<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
if(isset($_POST['submit']))
{
	$first=$_POST['first'];
	$last=$_POST['last'];
	$mobile=$_POST['mobile'];
	$ssn=$_POST['ssn'];
	$address=$_POST['address'];
	$dno=$_POST['dno'];
	$dob=$_POST['dob'];
	$doj=$_POST['doj'];
	if($first=='')
	{
		echo "enter your first name";
		exit();
	}
		if($last=='')
	{
		echo "enter your last name";
		exit();
	}
		if($mobile=='')
	{
		echo "enter your mobile number";
		exit();
	}
		if($dno=='')
	{
		echo "enter your department num";
		exit();	
	}
		if($ssn=='')
	{
		echo "enter your ssn";
		exit();	
	}
		if($address=='')
	{
		echo "enter your address";
		exit();
	}
	else
	{
		$que="insert into table_employee (f_name,l_name,mobile,ssn,address,doj,dob,dno) values ('$first','$last','$mobile','$ssn','$address','$doj','$dob','$dno')";		
		if(mysql_query($que))
		{
			echo "Submitted";
			echo "<script>alert{submitted succcesfully}</script>";
		}
		else
			die(mysql_error());
	}
	
}
?>