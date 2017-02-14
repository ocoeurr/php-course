<?php
if (!file_exists(__DIR__."/tests/".$_GET['id'].".json")) {
header('HTTP/1.0 404 Not Found', true);
echo "<h2>Запрашиваемая страница не найдена. Пожалуйста, выберите другой тест.<h2>";
die;
};

error_reporting(E_ALL);
ini_set("display_errors",1);
mb_internal_encoding("utf-8");
require "functions.php";
$id = $_GET['id'];
$availableTests = countTests();
$test = getData($id);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test <?php echo $id ?></title>
</head>
<body>
<form enctype="multipart/form-data" method="POST">
<?php
$userAnswers = [];
$userName;
echo "<form enctype=\"multipart/form-data\" method=\"POST\">";
	for ($i = 0; $i < count($test); $i++) {
    echo "<label for=\"name\">".$test[$i]["id"].". ".$test[$i]["question"]."</label>";
    echo "</br> </br>";
    echo "<input name=\"name[".$i."]\">";
    echo "</br> </br>";
    if (isPost()) {
        $userAnswers[$i] = htmlspecialchars($_POST["name"][$i]);
        $userAnswers[$i] = trim($userAnswers[$i]);
        $userAnswers[$i] = mb_strtolower($userAnswers[$i]);
      }
    }

	?>
<button type="submit">Отправить</button>
</br>
  </form>
<?php
$results = 0;
if (isPost()) {
  echo "</br>"."Результаты:"."</br>";
  for ($i = 0; $i < count($test); $i++)  {
    if ($userAnswers[$i] == $test[$i]["answer"]) {
      echo $test[$i]["id"]." - верно";
      echo "</br>";
      $results++;
    } else {
      echo $test[$i]["id"]." - не угадали, правильный ответ - ".$test[$i]["answer"];
      echo "</br>";
    }
  }
  echo "<img src=\"cert.php\">";
}
?>
  </body>
  </html>
