<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
 ?>
 <?php
    mb_internal_encoding("utf-8");
    require "functions.php";
    $id = $_GET['id'];
    $availableTests = countTests();
    if (($id < 1) || ($id > $availableTests)) {
      $id = 1;
    }
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
  </form>
  </body>
  </html>
