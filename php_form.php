
<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
	$first=$_POST['first'];
	$last=$_POST['last'];
	$mobile=$_POST['mobile'];
	$rollnum=$_POST['rollnum'];
	$address=$_POST['address'];
	$roomnum=$_POST['roomnum'];

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
		if($rollnum=='')
	{
		echo "enter your roll num";
		exit();	
	}
		if($roomnum=='')
	{
		echo "enter your room num";
		exit();	
	}
		if($address=='')
	{
		echo "enter your address";
		exit();
	}
	else
	{
		$que="insert into table_student (f_name,l_name,mobile,rollnum,address,roomnum) values ('$first','$last','$mobile','$rollnum','$address','$roomnum')";		
		if(mysql_query($que))
		{
			echo "Submitted";
			echo "<script>alert{submitted succcesfully}</script>";
		}
		else
			die(mysql_error());
	}
?>