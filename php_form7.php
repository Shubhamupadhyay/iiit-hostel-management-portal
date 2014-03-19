<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
	$r=$_POST['rn'];
	$d=$_POST['it'];
	$dc=$_POST['qt'];
		if($r=='')
	{
		echo "enter room number";
		exit();
	}
		if($d=='')
	{
		echo "enter item name";
		exit();
	}
		if($dc=='')
	{
		echo "enter quantity";
		exit();
	}
	else
	{
		$que="insert into table_storeroom (roomnum,item,quantity) values ('$r','$d','$dc')";		
		if(mysql_query($que))
		{
			Header("Location:main.html");
			echo "Submitted";
		}
		else
			die(mysql_error());
	}
?>