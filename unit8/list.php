<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
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
  if (countTests() > 0) {
    echo "<h2>"."Доступные тесты:"."</h2>";
    foreach ($testsList as $i => $value) {
      echo "</br>";
      echo $testsList[$i];
      if (isAdmin()) {
      if (isPost()) {
        deleteTest($_POST["deleteTest[$i]"]);
      }
      echo "<form method=\"POST\">";
      echo "<input name=\"deleteTest[".$i."]\" type=\"submit\" value=\"Удалить тест\" />";
      echo "</form>";
      }
   }
 }
 //echo "</br><a href=\"/admin.php\">Загрузить новый тест</a>";
 if (isAdmin()) {
   echo "</br><a href=\"admin.php\">Загрузить новый тест</a>";
 }
?>
  </body>
  </html>
