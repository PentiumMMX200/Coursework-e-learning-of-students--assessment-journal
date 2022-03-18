<!DOCTYPE html>
<html lang="ru">

<head>
    <?php include 'header.php'; ?>
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
        header('Location: main.php');
    ?>
    <?php endif; ?>
</body>

</html>