<?php
  $user = "user204";
  $pass = "gun_centos_user_204";
  $host = "localhost";
  $base = "user204";
    
  $con = new mysqli($host, $user, $pass, $base);
  if ($con->connect_errno) {
    echo("Не удалось подключиться к базе данных");
    die;
  }
?>