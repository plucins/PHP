<?php
  session_start();

  if(!isset($_SESSION['logged'])){
    header('Location: index.php');
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
  <link rel="stylesheet" href="css/magnific-popup.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="js/jquery.magnific-popup.js"></script>

</head>

<body>

  <header>
		<nav>
      <ul>
        <div id="wrapper">
          <div class=right_menu>
            <?php
              echo "Zalogowany jako ".$_SESSION['name']." ".$_SESSION['lastName'];
              echo '<a href="logout.php">Wyloguj</a>';
             ?>
          </div>
          <div class="clear"></div>
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="news.asp">News</a></li>
            <li><a href="contact.asp">Contact</a></li>
            <li><a href="about.asp">About</a></li>
       </ul>
      </div>
		</nav>
	</header>

  <div id="wrapper">
    <div class="add_button">
      <button type="submit" class="popup-with-form" href="#test-form">Dodaj</button>
    </div>




</body>


</html>
