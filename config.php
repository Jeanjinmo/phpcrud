<?php
$databaseHost = 'localhost';
$databaseName = 'databasephp'; // Database Name
$databaseUsername = 'root'; // Database Username
$databasePassword = ''; //Database Password

// MENGHUBUNGKAN DATABASE
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Dont have database | Not Connected
if (mysqli_connect_errno()) {
    printf("%s \n", mysqli_connect_error());
    exit();
}
