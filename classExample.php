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
  //вот тут цикл для трюка, но я его закомментирую, т.к. это общая схематичная логика, и в таком виде он ломает весь док, условие сильно более подробно надо расписывать
  // while (true) do
  //   {
  //     $this->defects++;
  //   }
    $this->tricks++;
   }


  public function ShowTrick($trick)
  {
    if (!FailTrick($trick))
    {
      echo "теперь я умею в ".$trick;
      $this->boasting++;
      $this->stickers++;
    }
  }

  public function PraiseBrand()
  {
    echo $brand." - лучшая марка бордов в мире!";
  }

  public function TimeForChange() {
    if ($defects > 100)
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

$myFirstBoard = new Snowboard("Nitro");
$myFirstBoard->mounting = "blue";
$myFirstBoard->cover = "K2";
$myFirstBoard->stickers = 10;

$mySecondBoard = new Snowboard("Flow");
$myFirstBoard->mounting = "green";
$myFirstBoard->cover = "Trial";
$myFirstBoard->stickers = 5;

$myBoardForJibbing = new Snowboard("Bataleon");
$myFirstBoard->mounting = "red";
$myFirstBoard->cover = "K2";
$myFirstBoard->stickers = 7;

$myBoardForCarving = new Snowboard("Burton");
$myFirstBoard->mounting = "yellow";
$myFirstBoard->cover = "Burton";
$myFirstBoard->stickers = 3;

$myBoardForFreeride = new Snowboard("Capita");
$myFirstBoard->mounting = "black";
$myFirstBoard->cover = "Burton";
$myFirstBoard->stickers = 15;

?>
