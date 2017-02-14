<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);
$forCert = [];

function login($login, $password) {
  if ((!empty($_POST["login"])) && (!empty($_POST["password"]))) {
     $data = file_get_contents(__DIR__ ."/login.json");
     $credentials = json_decode($data, true);
     foreach ($credentials as $key => $value) {
       if (($login == $credentials[$key]["login"]) && ($password == $credentials[$key]["pass"])) {
         $forCert[] = ["name" => "$login"];
         $_SESSION["admin"] = $login;
         return true;
       }
     }
   }
     return false;
 }

 function isAdmin() {
     if (empty($_SESSION["admin"])) {
         return false;
     }
     return !empty($_SESSION['admin']);
 }

function guest($guestName) {
   if (!empty($_POST["guestName"])) {
     $forCert[] = ["name" => "$guestName"];
     $_SESSION["guest"] = $guestName;
     $data = file_get_contents(__DIR__ ."/login.json");
     $data = json_decode($data, true);
     $data[] = ["name" => "$guestName"];
     $data = json_encode($data);
     file_put_contents(__DIR__ ."/login.json", $data);
     return true;
   }
   return false;
 }

function deleteTest($id) {
  unlink(__DIR__ ."/tests/".($id+1).".json");
}


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
  $uploadDirectory = dirname(__DIR__) . "/unit8/tests/";
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
  return $_POST[$name];
}

function getParamGet($name, $defaultValue = null) {
    return !empty($_GET[$name]) ? $_GET[$name] : $defaultValue;
}

function getList() {
  $dir = opendir(__DIR__. "/tests/");
  $array = [];
  while($file = readdir($dir)){
    if($file == '.' || $file == '..' || $file == '.DS_Store' || is_dir('path/to/dir' . $file)){
        continue;
    }
    $array[] = $file;
  }
  return $array;
}

function createCert($name, $result) {
  $text = "Поздравляем, ".$name."! \r\n\r\nВы набрали ".$result." балла и получаете \r\nсертификат о прохождении \r\nнашего курса загадок!";
  $image = imagecreatetruecolor(1000, 250);
  $backColor = imagecolorallocate($image, 20, 206, 209);
  $textColor = imagecolorallocate($image, 75, 0, 130);
  $fontFile = __DIR__."/assets/a_AlbionicTitulInfl_Bold.ttf";
  imagefill($image, 0, 0, $backColor);
  imagettftext($image, 40, 0, 10, 50, $textColor, $fontFile, $text);
  imagepng($image);
  imagedestroy($image);
}

function getAdminName() {
    return !empty($_SESSION['admin']) ? $_SESSION['admin'] : null;
}

function logout() {
    session_destroy();
}

function getBaseUrl() {    $dir = dirname($_SERVER['REQUEST_URI']);
    if (!empty($dir) && $dir[strlen($dir) - 1] != '/') {
        $dir .= '/';
    }
    return $dir;
}

function getUrl($fileName = 'index') {
    return getBaseUrl() . $fileName . '.php';
}

function location($fileName) {
    header('Location: ' . getUrl($fileName));
}

?>
