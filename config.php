<?php
	
	//Script by Monir
	//facebook.com/itzmonir
	
	$host = 'localhost';
	$name = 'fourpc_dic';
	$pass = 'ZVC6C2nf4gM(';
	$dbnm = 'fourpc_dic';
	
	$connect = mysqli_connect($host, $name, $pass) or die ('Database Connection Error!');
	mysqli_select_db($connect, $dbnm) or die ('Database Selection Error!');
	
	//Site Link
	$site = 'https://d.fourpc.com';
?>