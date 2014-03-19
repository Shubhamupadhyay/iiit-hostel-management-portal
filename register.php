<?php
$con=mysql_connect("localhost","root","");
$database=mysql_select_db('phpmysimplelogin',$con) or die(mysql_error());
	
	$first=$_POST['r_username'];
	$last=$_POST['r_password'];
	if($first=='')
	{
		echo "enter a username ";
		exit();
	}
		if($last=='')
	{
		echo "enter a password";
		exit();
	}
	else
	{
		$que="INSERT INTO `phpmysimplelogin`.`user` (`username`, `password`) VALUES ('$first', MD5('$last'));";		
		if(mysql_query($que))
		{
			echo "Submitted";
		}
		else
			die(mysql_error());
	}


?>