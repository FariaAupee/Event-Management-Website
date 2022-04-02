<?php
session_start();

$ServerName = "localhost";
$UserName = "root";
$Password = "";
$dbname = "events";

$connect = mysqli_connect($ServerName, $UserName, $Password, $dbname);

?>