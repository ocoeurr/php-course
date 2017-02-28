<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
mb_internal_encoding("utf-8");

$meds = [];
$pats = [];

function myAutoload($classNameWithNamespace) {
$classNameWithNamespace = str_replace("\\", "/", $classNameWithNamespace);
$pathToFile = __DIR__."/".$classNameWithNamespace.'.class.php';
if (file_exists($pathToFile)) {
include "$pathToFile";
  }
}

spl_autoload_register('myAutoload');



$med1 = new \medicine\Medicine("Стрепсилс", "med1");
$med2 = new \medicine\Medicine("Колдрекс", "med2");
$pat1 = new \patient\Patient("Иван", "pat1");
$doc1 = new \doctor\Doctor("Грачев");


$doc1->takePatient($pat1);
$doc1->prescribeRecipe(["med1", "med2"]);

$pat2 = new \patient\Patient("Марго", "pat2");

$doc1->takePatient($pat2);
$doc1->prescribeRecipe(["med2"]);

$doc2 = new \doctor\Doctor("Селезнева");
$pat3 = new \patient\Patient("Иннокентий", "pat3");
$med3 = new \medicine\Medicine("Афлубин", "med3");
$med4 = new \medicine\Medicine("Фарингосепт", "med4");
$med5 = new \medicine\Medicine("Шалфей", "med5");

$doc2->takePatient($pat3);
$doc2->prescribeRecipe(["med1", "med3", "med4", "med5"]);
 ?>
