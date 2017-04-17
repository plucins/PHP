<?php
  session_start();

  if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
    header('Location: dashboard.php');
    exit();
  }
?>

<!DOCTYPE HTML>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <header>
        <div id="wrapper">
            <form class="login_form" action="login.php" method="post">
                <input type="text" class="input_text long" name="userName" placeholder="User Name">
                <input type="password" class="input_text long" name="password" placeholder="Password">
                <?php
                  if(isset($_SESSION['error'])) echo $_SESSION['error'];
                 ?>
                <input type="submit" class="input_button" value="Login">
            </form>
        </div>
	</header>
</body>

</html>
