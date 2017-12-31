<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="wrapper_left">
  <div id="slidecontainer">
    <form action="" method="post">
    <a>Wartość kredytu: <output name="creditAmountNameOutPut" id="creditAmountIdOutPut"></output></a>
    <input type="range" name="creditAmountName" id="creditAmountId" min="1000" max="100000" step="100" class="slider" oninput="creditAmountIdOutPut.value = creditAmountId.value" >
    </div>
    <div id="slidecontainer">
    <a>Ilość rat: <output name="installmentsAmountNameOutPut" id="installmentsAmountIdOutPut" ></output></a>
    <input type="range" name="installmentsAmountName" id="installmentsAmountId" min="6" max="144" class="slider" oninput="installmentsAmountIdOutPut.value = installmentsAmountId.value" >
  </div>

  <div id="radioSection">
    <label class="container">Płatnośc online
  <input type="radio" checked="checked" name="paymentType" value="payOnline">
  <span class="checkmark"></span>
</label>
<label class="container">Pobranie z konta
  <input type="radio"  name="paymentType" value="getMonayFromAccount">
  <span class="checkmark"></span>
</label>
<label class="container">Płatnośc w kasie Banku
  <input type="radio" name="paymentType" value="payInBank">
  <span class="checkmark"></span>
</label>
  </div>

  <input type="submit" class="submitButton" name="submitButton" value="Licz rate">

  <?php

  if(isset($_POST['submitButton'])){
    $creditAmount = $_POST['creditAmountName'];
    $installmentsAmount = $_POST['installmentsAmountName'];
    $interest = discount(0.081);
    $q = 1 + ($interest/12);
    $oneInstallment = ($creditAmount * pow($q,$installmentsAmount)*($q-1))/(pow($q,$installmentsAmount)-1);
?>
<div id="display_form">

<?php
    echo "Wysokosc jednej raty: ".round($oneInstallment,2)."zł";
    echo "<br/>";
    echo "Do splaty: ".round($oneInstallment*$installmentsAmount,2)."zł";
    echo "<br/>";
    echo "Oprocentowanie ".$interest*100;
    echo "%";
  }
  ?>
</div>



<?php
function discount($interest){
  $choose = $_POST['paymentType'];
  if($choose == "payOnline"){
    $interest = $interest - 0.003;
  }elseif($choose == "getMonayFromAccount"){
    $interest = $interest - 0.006;
  }else{
    $interest = $interest + 0.003;
  }
  return $interest;
}


   ?>
 </div>

 <div id="wrapper_right">
   <div id="slidecontainer" >
     <form action="" method="post">
     <a>Kwota: <output name="locatAmountNameOutPut" id="locatAmountIdOutPut"></output></a>
     <input type="range" name="locatAmountName" id="locatAmountId" min="100" max="10000" step="100" value="50%" class="slider slider1" oninput="locatAmountIdOutPut.value = locatAmountId.value" >
     </div>
     <div id="slidecontainer">
     <a>Dni lokaty: <output name="installmentsNameOutPut" id="installmentsIdOutPut"></output></a>
     <input type="range" name="installmentsName" id="installmentsId" min="30" max="365" value="50%" class="slider slider1" oninput="installmentsIdOutPut.value = installmentsId.value" >
   </div>

   <input type="submit" class="submitButton submitButton1" name="submitButton1" value="Licz rate">


  <?php

  //kapitalizacja 1 rok
    if(isset($_POST['submitButton1'])){
        $kwota_lokaty = $_POST['locatAmountName'];
        $czas_lokaty = $_POST['installmentsName'];

        if($czas_lokaty <= 60){
          $oprocentowanie = 3;
        }elseif ($czas_lokaty < 60 || $czas_lokaty <= 180 ) {
          $oprocentowanie = 4;
        }else{
          $oprocentowanie = 5;
        }

        $zysk_b = round(($kwota_lokaty * $oprocentowanie / 100) * ($czas_lokaty / 365),2);
        $zysk_n = round($zysk_b * 0.81, 2);

      ?>
      <div id="display_form1">

      <?php
      echo "Oprocentowanie: $oprocentowanie %";
      echo "</br>";
      echo "Zysk brutto: $zysk_b zł";
      echo "</br>";
      echo "Zysk netto: $zysk_n zł";


    }
  ?>

  </div>
</div>




</body>
</html>
