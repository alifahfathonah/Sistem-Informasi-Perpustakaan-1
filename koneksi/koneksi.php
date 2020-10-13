<?php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
$host = "localhost"; 
$user = "root"; 
$pass = "";
$dbname = "perpusmuha";
$connect = mysqli_connect($host, $user, $pass) or die("Failed To Connect!!".mysqli_error());
$dbselect = mysqli_select_db($dbname, $connect);
date_default_timezone_set('Asia/Jakarta');
	$tgl=date("Y-m-d");
	$jam=date("H:i:s");
?>