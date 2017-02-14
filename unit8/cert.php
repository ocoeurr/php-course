<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
require "functions.php";
header('Content-Type: image/png');
//вот с таким кодом (с дефолтными значениями) сертификат работает:
//createCert("друг", 4);
//но если заменить рандомный результат теста на реальный, сертификат перестает создаваться, при этом сам $forCert["result"] в массиве $forCert существует:
//createCert("Иван", $forCert["result"]);
//а вот это код, с которым в идеале конечно должно работать, но $forCert["name"] в массиве не существует, т.к. он почему-то не пишется при логине
createCert($forCert["name"], $forCert["result"]);
?>
