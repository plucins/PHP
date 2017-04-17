<<?php

session_start();

require_once "db_connect.php";

$connection = @new mysqli($host, $db_user, $db_pass, $db_name);

if($connection->connect_errno!=0){
  echo "Error: ".$connection->connect_errno;
}else {

  $id = $_POST['id'];

 ?>
