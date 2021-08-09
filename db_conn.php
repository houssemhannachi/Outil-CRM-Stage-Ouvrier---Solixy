<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "sol";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	die('Please check your connection'.mysqli_error());
} 