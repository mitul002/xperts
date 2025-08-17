<?php
$host = "localhost";     
$user = "root";          
$pass = "";             
$db   = "xperts_db";    

// Connect to MySQL
$connect = new mysqli($host, $user, $pass, $db);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
