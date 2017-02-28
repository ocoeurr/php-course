<?php

namespace medicine;

interface MedicineInterface {
  public function __construct($name, $id);
}

class Medicine implements MedicineInterface
{
  private $name;
  private $id;

  public function __construct($name, $id)
  {
    global $meds;
    $this->name = $name;
    $this->id = $id;
    $meds[$id] = $this;
  }

  private function takenMedicine()
  {
    echo "Лекарство ".$this->name.": я выпито! </br>";
  }

  public function __get($id)
  {
    if (isset($this->$id))
    {
      return $this->$id;
    }
  }

  public function __call($takenMedicine, $arguments)
  {
    return $this->takenMedicine();
  }

}

?>
