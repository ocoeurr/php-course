<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
mb_internal_encoding("utf-8");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-do-do</title>
    <h1>Список дел на сегодня</h1>
    <style type="text/css">
        tr.header th {
            color: #191970;
            font-weight: bold;
        }
        tr.light td {
            color: #483D8B;
            font-weight: bold;
        }
    </style>
</head>
<body>
  <form enctype="multipart/form-data" method="POST">
  <button type="submit">Добавить</button>
  <input name="add">
  </form>
    <table cellpadding = "10" align="center" charset="UTF-8">
    <thead>
        <tr class = "header">
            <th>Описание задачи</th>
            <th>Дата добавления</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=global", "slesarenko", "neto0845");
    $pdo->query("SET NAMES utf8");
    $pdo->query("SET time_zone = '+00:00'");
    $pdo->query("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");
    $pdo->query("SET foreign_key_checks = 0");
    $pdo->query("DROP TABLE IF EXISTS `tasks`");
    $pdo->query("CREATE TABLE `tasks` (`id` int(11) NOT NULL AUTO_INCREMENT,`description` text NOT NULL,`is_done` tinyint(4) NOT NULL DEFAULT '0',`date_added` datetime NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8");

    function isPost() {
      return !empty($_POST);
    }

    if (isPost()) {
        if ($_POST["add"]) {
            $newTask = $pdo->query("INSERT INTO tasks (description, date_added, is_done) VALUES (".$_POST["description"].", ".date(DATE_RFC822).", false)");
        }
      }
    $stmt = $pdo->query("SELECT * FROM tasks");
    foreach ($stmt as $row):
      var_dump($row);
      echo "</br>";
      if (isPost()) {
        if ($_POST["do".$row['id']]) {
          $todo = $pdo->query("UPDATE tasks SET is_done=true WHERE id = ".$row['id']);
        } elseif ($_POST["delete".$row['id']]) {
          $todo = $pdo->query("DELETE FROM tasks WHERE id = ".$row['id']);
        }
      }
      ?>
        <tr class="light">
            <td><?= $row["description"] ?></td>
            <td><?= $row["date_added"] ?></td>
            <td><?php if ($row["is_done"] == true) {
                echo "Done!";
              } else {
                echo "In progress";
              }?>
            </td>
            <td>
              <form method="POST">
                <input name="do".<?=$row['id']?>."" type="submit" value="Выполнить"/>
              </form>
              <form method="POST">
                <input name="delete".<?= $row['id']?>."" type="submit" value="Удалить"/>
              </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>
