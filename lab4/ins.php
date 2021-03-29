<?php
session_start();
if ($username != "Admin")
    die("Ты хто?");

require_once "connect.php";
$name = $_POST['country_name'];
$query = "insert into country(name) values('$name')";
$res = $con->query($query);
header("Location: index.php");
?>