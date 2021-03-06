<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
 ?>
 <?php
function getData($id) {
    $data = file_get_contents(__DIR__ ."/tests/".$id.".json");
    $array = json_decode($data, true);
    return $array;
}

function uploadFile() {
  $allowedExt = "json";
  $fileName = $_FILES["file"]["name"];
  $ext = substr($fileName, strrpos($fileName,".")+1);
  if ($ext != $allowedExt) {
    echo "Неверный формат файла. Пожалуйста, загрузите файл в формате json.";
    return false;
  }
  $uploadDirectory = dirname(__DIR__) . "/unit6/tests/";
  if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDirectory.$fileName)) {
    echo "Успех!";
  } else {
    echo "При загрузке файла произошла ошибка.";
  }
}

function countTests() {
  $array = getList();
  $count = count($array);
  return $count;
}

function isPost() {
  return !empty($_POST);
}

function isFile() {
  return !empty($_FILES);
}

function getParamPost($name, $defaultValue = null) {
  return !empty($_POST[$name]);
}

function getList() {
  $dir = opendir(__DIR__. "/tests/");
  $array = [];
  while($file = readdir($dir)){
    if($file == '.' || $file == '..' || is_dir('path/to/dir' . $file)){
        continue;
    }
    $array[] = $file;
  }
  return $array;
}
?>
