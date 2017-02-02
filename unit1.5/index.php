<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
 ?>
<?php
  require_once "functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <table cellpadding = "10" align="center">
    <thead>
        <tr class = "header">
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Адрес</th>
            <th>Номер телефона</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (getData() as $item): ?>
        <tr class="light">
            <td><?= $item["firstName"] ?></td>
            <td><?= $item["lastName"] ?></td>
            <td><?= $item["address"] ?></td>
            <td><?= $item["phoneNumber"] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>
