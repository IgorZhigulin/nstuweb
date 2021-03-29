<?php
require_once "connect.php";

$query = "delete from visit_logger where id=$_GET[id]";
$con->query($query);
header("location:./");
?>