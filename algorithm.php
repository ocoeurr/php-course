<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
 ?>
<?php
$userNumber = rand(0,100);
$systemNumber1 = 1;
$systemNumber2 = 1;
do {
  if ($systemNumber1 > $userNumber) {
  echo "задуманное число НЕ входит в числовой ряд";
  break;
} else if ($systemNumber1 = $userNumber)
        {
          echo "задуманное число входит в числовой ряд";
          break;
        }
        else {
          $systemNumber3 = $systemNumber1;
          $systemNumber1 = $systemNumber1 + $systemNumber2;
          $systemNumber2 = $systemNumber3;
        }
      } while ($systemNumber1 <= $userNumber);
      echo "</br>";
      echo "ваше число: ".$userNumber;
 ?>
