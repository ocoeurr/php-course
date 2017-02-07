<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
 ?>
 <?php
    require "functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of tests</title>
</head>
<body>
  <?php
  $testsList = getList();

  if (count($testsList) > 0) {
    echo "<h2>"."Доступные тесты:"."</h2>";
    //ниже костыль для удаления скрытых системных файлов Mac OS, почему-то пока что не получилось загнать его в функцию (не все системные файлы удаляются тогда)
    foreach ($testsList as $i => $value) {
    if  (substr($testsList[$i], strrpos($testsList[$i],".json")) != ".json") {
    unset ($testsList[$i]);
   } else {
      echo "</br>";
      echo $testsList[$i];
    }
  }
}
?>
  </body>
  </html>
