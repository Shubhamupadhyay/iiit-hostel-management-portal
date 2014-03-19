<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
	$roomnum=$_POST['roomnum'];
	$type=$_POST['type'];
	$nob=$_POST['nob'];
	$noc=$_POST['noc'];
	$not=$_POST['not'];
	if($roomnum=='')
	{
		echo "enter room number";
		exit();
	}
		if($type=='')
	{
		echo "enter room type";
		exit();
	}
		if($nob=='')
	{
		echo "enter number of beds";
		exit();
	}
		if($noc=='')
	{
		echo "enter number of chairs";
		exit();	
	}
		if($not=='')
	{
		echo "enter number of tables";
		exit();	
	}
	else
	{
		$que="insert into room (roomno,type,nob,noc,tables) values ('$roomnum','$type','$nob','$noc','$not')";		
		if(mysql_query($que))
		{
			echo "Submitted";
		}
		else
			die(mysql_error());
	}
?>