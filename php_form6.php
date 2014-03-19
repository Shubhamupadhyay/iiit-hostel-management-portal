<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('students_reg',$con) or die(mysql_error());
	$i=$_POST['i'];
	$b=$_POST['b'];
	$d=$_POST['d'];
	$de=$_POST['de'];
	if($i=='')
	{
		echo "enter item name";
		exit();
	}
		if($d=='')
	{
		echo "enter date of maintenance";
		exit();
	}
		if($de=='')
	{
		echo "enter detail";
		exit();
	}
		if($b=='')
	{
		echo "bill number";
		exit();
	}
	else
	{
		$que="insert into table_maintain (item,dom,problem,billnum) values ('$i','$d','$de','$b')";		
		if(mysql_query($que))
		{
			echo "Submitted";
		}
		else
			die(mysql_error());
	}
?>