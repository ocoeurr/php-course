<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<meta charset=UTF-8>
<title>About me</title>
<h1>
<?php
echo "Страница пользователя Анна";
 ?>
</h1>
<?php
$name = "Анна";
$age = 24;
$email = "slesarenko.anna@gmail.com";
$city = "Новосибирск";
$infoAboutMe = "Test support engineer";
echo "Имя: ".$name."<br>";
echo "Возраст: ".$age."<br>";
echo "Адрес электронной почты: ".$email."<br>";
echo "Город: ".$city."<br>";
echo "О себе: ".$infoAboutMe."<br>";
 ?>
</body>
</html>
