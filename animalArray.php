<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
 ?>
 <?php
$allAnimals = array(
"southAmerica" => array("Chrysocyon brachyurus", "Hydrochoerus hydrochaeris"),
"Africa" => array("Civettictis civetta", "Manis gigantea", "Orycteropus afer", "Euoticus elegantulus", "Cryptoprocta ferox"),
"Eurasia" => array("Desmana moschata", "Sus barbatus", "Bison", "Hystrix"),
"Australia" => array("Vampyroteuthis infernalis", "Sarcophilus laniarius", "Macropus rufogriseus", "Dendrolagus")
);

$twoWordAnimals = $allAnimals;

foreach ($twoWordAnimals as $continent => $animal) {
  foreach ($animal as $animalName => $value) {
    if (str_word_count($twoWordAnimals[$continent][$animalName]) < 2) {
      unset($twoWordAnimals[$continent][$animalName]);
    }
  }
}

foreach ($twoWordAnimals as $continent => $animal) {
  foreach ($animal as $animalName => $value) {
    $twoWordAnimals[$continent][$animalName] = explode(" ", $twoWordAnimals[$continent][$animalName]);
    }
  }

$mixedTwoWordAnimals = $twoWordAnimals;
$secondNames = array();
foreach ($mixedTwoWordAnimals as $continent => $animal) {
  foreach ($animal as $animalName => $value) {
      $secondNames[]=$mixedTwoWordAnimals[$continent][$animalName][1];
  }
}

shuffle($secondNames);

foreach ($mixedTwoWordAnimals as $continent => $animal) {
  for ($i=0;$i<count($animal);$i++) {
      $mixedTwoWordAnimals[$continent][$i][1] = $secondNames[$i];
      unset($secondNames[$i]);
  }
  $secondNames = array_values($secondNames);
}

foreach ($mixedTwoWordAnimals as $continent => $animal) {
  echo "<h1>".$continent."</h1>";
  echo "</br>";
  foreach ($animal as $animalName => $value) {
      echo implode(" ", $mixedTwoWordAnimals[$continent][$animalName]);
      end($mixedTwoWordAnimals[$continent]);
      $last = key($mixedTwoWordAnimals[$continent]);
      if ($animalName !== $last) {
      echo ", ";
      }
  }
}
?>
