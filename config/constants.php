<?php 
session_start();
// define('SITURL', "https://localhost:7882/php%20template/");
define('servername','localhost');
define('username','root');
define('password','');
define('db_name', 'food_php');

$conn = mysqli_connect(servername, username, password, db_name);


?>