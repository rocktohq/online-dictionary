<?php 
	//sitemap.php
	//Dictionary Script by Monir
	//Saidul Mursalin
	//Facebook.com/itzmonir
	
	//Lets Start The Session
	//session_start();
	error_reporting(0);
	
	//DB Info
	include 'config.php';
	
	$query = "SELECT * FROM words";
	
	$result = mysqli_query($connect, $query);
	
	header("Content-Type: application/xml; charset=utf-8");
	
	echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
	
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
	
	while($row = mysqli_fetch_array($result))
	{
		echo '<url>' . PHP_EOL;
		echo '<loc>'.$site.'/'.$row["word"] .'.html</loc>' . PHP_EOL;
		echo '<lastmod>2019-09-09</lastmod>' . PHP_EOL;
		echo '<changefreq>weekly</changefreq>' . PHP_EOL;
		echo '</url>' . PHP_EOL;
	}
	
	echo '</urlset>' . PHP_EOL;
	
?>