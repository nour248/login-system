<?php

$servername = "localhost" ; 
$dbusername = "root" ; 
$dbPassword = "";
$dbname = "loginsystemtut";

$conn = mysqli_connect( $servername , $dbusername ,$dbpassword ,$dbname ) ; 

if ( !$conn)
{
    die("Connection feiled : ".mysqli_connect_error) ; 
}