<?php
/* Database credentials for Live Server*/

$db_host = "localhost"; //host name depends on server

$db_user = "";

$db_pass = "";

$db_name = "";

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
?>