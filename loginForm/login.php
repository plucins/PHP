<?php

  session_start();

  if((!isset($_POST['userName'])) || (!isset($_POST['password']))){
    header('Location: index.php');
    exit();
  }

  require_once "db_connect.php";

  $connection = @new mysqli($host, $db_user, $db_pass, $db_name);

  if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno;
  }else {

    $login = $_POST['userName'];
    $password = $_POST['password'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

    
    if($result = @$connection->query(sprintf("SELECT * FROM users WHERE login='%s' AND pass='%s'",
    mysqli_real_escape_string($connection, $login),
    mysqli_real_escape_string($connection, $password)))){
      $how_many_users = $result->num_rows;
      if($how_many_users>0){

        $_SESSION['logged'] = true;

        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastName'] = $row['lastName'];

        unset($_SESSION['error']);
        $result->close();
        header('Location: dashboard.php');

      }else {
        $_SESSION['error']='<span style="color:red; margin-left:40px;">Nieprawidłowy login lub hasło</span>';
        header('Location: index.php');
      }
    }

    $connection->close();
  }




 ?>
