<?php
session_start();
if ($username != "Admin" && $username != "Overlord")
    die("Ты хто?");

require_once "connect.php";
$id = $_GET['id'];
$query = "delete from country where id = '$id'";
$res = $con->query($query);
header("Location: index.php");
?>