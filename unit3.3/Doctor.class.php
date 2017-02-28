<?php

namespace doctor;

interface DoctorInterface {
  public function __construct($name);
  public function takePatient($patient);
  public function prescribeRecipe($medicines);
}

class Doctor implements DoctorInterface
{
  private $name;
  private $takenPatient;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function takePatient($patient)
  {
    $this->takenPatient = $patient->id;
    echo "Доктор ".$this->name.": пациент ".$patient->name.", пройдите на прием. </br>";
  }

  public function prescribeRecipe($medicines)
  {
    global $pats;
    echo "Доктор ".$this->name.": ".$pats[$this->takenPatient]->name.", назначаю вам лекарства, примите их незамедлительно. </br>";
    $pats[$this->takenPatient]->takeMedicines($medicines);

  }

}

?>
