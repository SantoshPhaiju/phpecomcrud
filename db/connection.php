<?php

$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'ecommerceproject';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
