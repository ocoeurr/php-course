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
    <title>Admin Resource</title>
</head>
<body>
  <?php
  if (isFile()) {
    uploadFile();
  }
?>
<form enctype="multipart/form-data" method="POST">
  <label for="file">Пожалуйста, загрузите файл с тестами.</label>
  <br />
  <br />
  <input type="file" id="file" name="file">
  <br />
  <br />
  <button type="submit">Отправить</button>
</form>
  </body>
  </html>
