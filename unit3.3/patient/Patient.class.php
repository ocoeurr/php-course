<?php

namespace patient;

interface PatientInterface {
  public function __construct($name, $id);
  public function takeMedicines($medicines);
}

class Patient implements PatientInterface
{
  private $name;
  private $id;

  public function __construct($name, $id)
  {
    global $pats;
    $this->name = $name;
    $this->id = $id;
    $pats[$id] = $this;
  }

  public function takeMedicines($medicines)
  {
    global $meds;
    echo $this->name.": Спасибо! Cейчас обязательно всё выпью. </br>";
    foreach ($medicines as $key => $medicine) {
      $meds[$medicine]->takenMedicine();

    }
    echo "</br>";
  }

  public function __get($id)
  {
    if (isset($this->$id))
    {
      return $this->$id;
    }
  }

}
 ?>
