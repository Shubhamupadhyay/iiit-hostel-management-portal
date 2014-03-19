<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
	$dnum=$_POST['dnum'];
	$dname=$_POST['dname'];
	$now=$_POST['now'];
	if($dnum=='')
	{
		echo "enter department number";
		exit();
	}
		if($dname=='')
	{
		echo "enter department name";
		exit();
	}
		if($now=='')
	{
		echo "enter number of workers";
		exit();
	}
	else
	{
		$que="insert into table_department (dname,dno,no_of_workers) values ('$dnum','$dname','$now')";		
		if(mysql_query($que))
		{
			echo "Submitted";
		}
		else
			die(mysql_error());
	}
?>