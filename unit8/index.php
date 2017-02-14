<?php
require_once "functions.php";
error_reporting(E_ALL);
ini_set("display_errors",1);
$errors = [];
if (isPost()) {
   if ((login(getParamPost("login"), getParamPost("password"))) || guest(getParamPost("guestName"))) {
      location("list");
        die;
    }
    else {
        $errors[] = "Неверный логин или пароль. Если у вас еще нет учетной записи, пожалуйста, войдите в систему как гость.";
    }
}
error_reporting(E_ALL);
ini_set("display_errors",1);
mb_internal_encoding("utf-8");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Стартовая страница</title>
</head>
<body>
<td> Пожалуйста, авторизуйтесь </td>
<form enctype="multipart/form-data" method="POST">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <div class="form-group">
        <label for="login">Логин:</label>
        <input name="login" type="text" id="login">
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <td> <br> Или войдите в систему как гость </td>
    <div class="form-group">
        <label for="guestName">Ваше имя:</label>
        <input name="guestName" type="text" id="name">
    </div>
    <br>
    <button type="submit" class="btn btn-default">Вход</button>
</form>
</body>
</html>
