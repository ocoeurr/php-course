<?php
function getData()
{
    $data = file_get_contents(__DIR__ . "/data.json");
    $array = json_decode($data, true);
    return $array;
}
?>
