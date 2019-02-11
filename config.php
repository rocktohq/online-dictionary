<?php
	
	//Script by Monir
	//facebook.com/itzmonir
	
	$host = 'localhost';
	$name = 'sfmu';
	$pass = 'sfmu321';
	$dbnm = 'sfmu';
	
	$connect = mysqli_connect($host, $name, $pass) or die ('Database Connection Error!');
	mysqli_select_db($connect, $dbnm) or die ('Database Selection Error!');
		
?>