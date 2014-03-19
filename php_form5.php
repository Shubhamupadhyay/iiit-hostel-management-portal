<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
	$c=$_POST['complaint'];
	$r=$_POST['rn'];
	$d=$_POST['d'];
	$dc=$_POST['dc'];
	$dr=$_POST['dr'];
	if($c=='')
	{
		echo "enter complaint number";
		exit();
	}
		if($r=='')
	{
		echo "enter room number";
		exit();
	}
		if($d=='')
	{
		echo "enter detail";
		exit();
	}
		if($dc=='')
	{
		echo "enter date of complaint";
		exit();
	}
		if($dr=='')
	{
		echo "enter date of issue resolved";
		exit();
	}
	else
	{
		$que="insert into complaint (complaint_num,c_roomnum,detail,d_of_c,d_of_r) values ('$c','$r','$d','$dc','$dr')";		
		if(mysql_query($que))
		{
			echo "Submitted";
		}
		else
			die(mysql_error());
	}
?>