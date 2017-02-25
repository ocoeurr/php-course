<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
mb_internal_encoding("utf-8");

class Snowboard
{
  private $brand;
  public $cover;
  public $stickers;
  public $mounting;
  private $defects;
  private $tricks;
  private $boasting;

  public function __construct($brand)
  {
    $this->brand = $brand;
    echo "Я купил новый сноуборд ".$brand.", могу себе позволить!</br>";
    $this->boasting++;
  }

  private function FailTrick($trick)
  {
  // while (true) do
  //   {
  //     $this->defects++;
  //   }
    $this->tricks++;
   }


  public function ShowTrick($trick)
  {
    // $this->FailTrick($trick);
    if (!$this->FailTrick($trick))
    {
      echo "теперь я умею в ".$trick;
      $this->boasting++;
      $this->stickers++;
    }
  }

  public function PraiseBrand()
  {
    echo $this->brand." - лучшая марка бордов в мире!";
  }

  public function TimeForChange() {
    if ($this->defects > 100)
    {
      echo "какая развалина, пора покупать новый";
    }
    else
    {
      echo "да он еще меня переживет";
      $this->boasting++;
    }
  }

}

class Surfing
{
  private $brand;
  private $material;
  private $length;
  public $leash;
  private $defects;
  private $tricks;
  private $boasting;

  public function __construct($brand, $material, $length)
  {
    $this->brand = $brand;
    $this->material = $material;
    $this->length = $length;
    echo "Австралия, жди меня с новой доской от ".$brand."!</br>";
    $this->boasting++;
  }


public function ClimbUp()
{
  //...
}

public function SurfUp()
{
  if ($this->ClimbUp()) {
    echo "Поймал волну!";
    $this->boasting++;
  } else {
    $this->defects++;
  }
}

public function Polish() {
  $this->defects--;
}

private function FailTrick($trick)
{
// while (true) do
//   {
//     $this->defects++;
//   }
  $this->tricks++;
 }


public function ShowTrick($trick)
  {
    if (!$this->FailTrick($trick))
    {
      echo "теперь я умею в ".$trick;
      $this->boasting++;
      $this->stickers++;
    }
  }

}

class Bike
{
  private $brand;
  private $chain;
  private $wheels;
  private $defects;
  private $tricks;
  private $boasting;


  public function __construct($brand, $chain, $wheels)
  {
    $this->brand = $brand;
    $this->chain = $chain;
    $this->wheels = $wheels;
    echo "Есть два типа людей - те, которые считают, что велик стоит всего-то 10тр, и те, которые знают, насколько хороши велики от ".$brand."!</br>";
    $this->boasting++;
  }

  public function Ride($km)
  {
    echo "сегодня я проехал ".$km."км!";
    $this->defects++;
  }

  public function ChangeChain($chain) {
    $this->chain = $chain;
    $this->defects--;
  }

  public function ChangeWheels($wheels) {
    $this->wheels = $wheels;
    $this->defects--;
  }

  private function FailTrick($trick)
  {
    // while (true) do
    //   {
    //     $this->defects++;
    //   }
      $this->tricks++;
   }


  public function ShowTrick($trick)
  {
    if (!$this->FailTrick($trick))
    {
      echo "теперь я умею в ".$trick;
      $this->boasting++;
    }
  }

}

class Skate
{
  private $brand;
  private $material;
  public $wheels;
  public $stickers;
  public $suspension;
  private $defects;
  private $tricks;
  private $boasting;

  public function __construct($brand, $material, $wheels, $suspension)
  {
    $this->brand = $brand;
    $this->material = $material;
    $this->wheels = $wheels;
    $this->suspension = $suspension;
    echo "Off the wall!</br>";
    $this->boasting++;
  }

  public function ChangeDeck($brand, $material) {
    $this->brand = $brand;
    $this->material = $material;
    $this->defects--;
  }

  public function ChangeWheels($wheels) {
    $this->wheels = $wheels;
    $this->defects--;
  }

  public function ChangeSuspension($suspension) {
    $this->suspension = $suspension;
    $this->defects--;
  }

  private function FailTrick($trick)
  {
    // while (true) do
    //   {
    //     $this->defects++;
    //   }
      $this->tricks++;
   }

  public function ShowTrick($trick)
  {
    if (!$this->FailTrick($trick))
    {
      echo "теперь я умею в ".$trick;
      $this->boasting++;
    }
  }

}

class Ski
{
  private $brand;
  private $length;
  public $skiPoles;
  private $defects;
  private $tricks;
  private $boasting;
  private $hateLevel;

  public function __construct($brand, $length)
  {
    $this->brand = $brand;
    $this->length = $length;
    echo "К черту ваш сноуборд, у меня есть лыжи!</br>";
    $this->boasting++;
  }

  private function FailTrick($trick)
  {
    // while (true) do
    //   {
    //     $this->defects++;
    //   }
      $this->tricks++;
   }


  public function ShowTrick($trick)
  {
    if (!$this->FailTrick($trick))
    {
      echo "теперь я умею в ".$trick;
      $this->boasting++;
    }
  }

  public function HateBoarders()
  {
    echo "клятые сноубордисты :/";
    $this->hateLevel++;
  }

  public function TimeForChange()
  {
    if ($this->defects > 100)
    {
      echo "какая развалина, пора покупать новый";
    }
    else
    {
      echo "да он еще меня переживет";
      $this->boasting++;
    }
  }

}

$myBoard = new Snowboard("Bataleon");
$myBoard->mounting = "red";
$myBoard->cover = "K2";
$myBoard->stickers = 7;

$mySurf = new Surfing("Bessell Surfboards", "fiberglass", 300);
$mySurf->leash = "FCS";

$mySkate = new Skate("Element", "canadian maple", "Icon Pro", "Mag");
$mySkate->stickers = 5;

$myBike = new Bike("Specialized", "Shimano", "Velosa");

$mySki = new Ski("Rossignol", 177);
$mySki->skiPoles = "Leki";

?>
