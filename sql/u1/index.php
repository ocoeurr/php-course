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
    <title>Books</title>
    <h1>Библиотека успешного человека</h1>
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
  <label for="isbn">ISBN</label>
  <input name="isbn">
  <label for="name">Название книги</label>
  <input name="name">
  <label for="author">Автор книги</label>
  <input name="author">
  <button type="submit">Поиск</button>
    <table cellpadding = "10" align="center" charset="UTF-8">
    <thead>
        <tr class = "header">
            <th>Название</th>
            <th>Автор</th>
            <th>Год выпуска</th>
            <th>Жанр</th>
            <th>ISBN</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=global", "slesarenko", "neto0845");
    $pdo->query("SET NAMES utf8");

    function isPost() {
      return !empty($_POST);
    }

    if (isPost()) {
        if ($_POST["isbn"]) {
            $stmt = $pdo->query("SELECT * FROM books WHERE isbn = \"".$_POST["isbn"]."\"");
        } elseif ($_POST["name"]) {
          $stmt = $pdo->query("SELECT * FROM books WHERE name LIKE \"%".$_POST["name"]."%\"");
        } else {
          $stmt = $pdo->query("SELECT * FROM books WHERE author LIKE \"%".$_POST["author"]."%\"");
        }
    } else {
    $stmt = $pdo->query("SELECT * FROM books");
    }
    foreach ($stmt as $row): ?>
        <tr class="light">
            <td><?= $row["name"] ?></td>
            <td><?= $row["author"] ?></td>
            <td><?= $row["year"] ?></td>
            <td><?= $row["genre"] ?></td>
            <td><?= $row["isbn"] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>
