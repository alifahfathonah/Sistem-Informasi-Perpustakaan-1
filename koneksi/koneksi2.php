
<?php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
$host_name = "localhost";
$database = "perpusmuha"; // Change your database name
$username = "root";          // Your database user id 
$password = "";          // Your password
date_default_timezone_set('Asia/Jakarta');
	$ktgl=date("Y-m-d");
	$kjam=date("H:i:s");
	$hari=date("Y-m-d");
	$bulan=date("Y-m");
//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>


