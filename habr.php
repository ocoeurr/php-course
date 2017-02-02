<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
 ?>
 <?php
mb_internal_encoding("utf-8");
$id = $_GET['id'];
$url = "https://habrahabr.ru/post/".strval($id)."/";
$headers = get_headers($url);

if ($headers[0] != "HTTP/1.1 200 OK") {
  $finalArray = ["status" => "Error!"];
} else {
  $content = file_get_contents($url);
  $separators = ["<div", "<h1", "<span", "<a", "<img", "<i>", "<br", "<meta"];
  function explodeX($separators,$text) {
        $access = "%gei843kfgd112%";
        $text = str_replace($separators, $access, $text);
        $result = explode($access,$text);
        return $result;
}
$dataArray = explodeX($separators, $content);

$specialData = array();

$sourceTags = ["post__title-arrow",
              "content html_format",
              "post__time_published",
              "voting-wjt__counter-score js-score",
              "views-count_post",
              "favorite-wjt__counter",
              "flag flag_"];

foreach ($sourceTags as $searchedItem => $value) {
    foreach($dataArray as $i => $value) {
      if (mb_stripos($dataArray[$i], $sourceTags[$searchedItem])) {
        if (($sourceTags[$searchedItem] !== "post__title-arrow") && ($sourceTags[$searchedItem] !== "content html_format")) {
          $dataArray[$i] = mb_substr($dataArray[$i], 0, mb_strpos($dataArray[$i], "<"));
          $dataArray[$i] = mb_substr($dataArray[$i], mb_strpos($dataArray[$i], ">")+mb_strlen(">"));
          $dataArray[$i] = trim($dataArray[$i]);
          $specialData[] = $dataArray[$i];
          if ($sourceTags[$searchedItem] != "flag flag_") {
            break;
          }
        } else if ($sourceTags[$searchedItem] == "post__title-arrow") {
          $dataArray[$i+1] = mb_substr($dataArray[$i+1], 0, mb_strpos($dataArray[$i+1], "<"));
          $dataArray[$i+1] = mb_substr($dataArray[$i+1], mb_strpos($dataArray[$i+1], ">")+mb_strlen(">"));
          $dataArray[$i+1] = trim($dataArray[$i+1]);
          $specialData[] = $dataArray[$i+1];
        } else {
          $dataArray[$i+3] = mb_substr($dataArray[$i+3], 0, mb_strpos($dataArray[$i+3], ".")+mb_strlen("."));
          $dataArray[$i+3] = mb_substr($dataArray[$i+3], mb_strpos($dataArray[$i+3], ">")+mb_strlen(">"));
          $dataArray[$i+3] = trim($dataArray[$i+3]);
          $specialData[] = $dataArray[$i+3];
        }
      }
    }
  }

$keysArray = ["title", "text", "date", "rating", "stars", "views", "tags"];

foreach ($specialData as $i => $value) {
  if ($i < array_search("tags", $keysArray)) {
    $finalArray[$keysArray[$i]] = $specialData[$i];
  } else if ($specialData[$i] != null) {
    $finalArray["tags"][] = $specialData[$i];
    }
  }
}

echo $jsonArray = json_encode($finalArray, JSON_UNESCAPED_UNICODE);

?>
