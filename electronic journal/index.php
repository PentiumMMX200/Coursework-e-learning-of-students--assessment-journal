<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    if ($_COOKIE['log'] == '') :
    ?>
    <div class="registration">
        <h1>
            Вход в Журнал
        </h1>
        <form action="/auth.php" method="post">
            <input type="text" class="formControl" name="login" id="login" placeholder="Введите логин"><br>
            <input type="password" class="formControl" name="password" id="password" placeholder="Введите пароль"><br>
            <button class="btn btnLog">
                Войти в систему
            </button>
        </form>
    </div>
    <?php else :
        header('Location: main.html');
    ?>
    <?php endif; ?>
</body>

</html>