<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whats up!</title>
</head>

<body>
    <h1>
        Спортсмен на месте! Здарова)
    </h1>
    <button><a href='/exit.php'>Завершить сеанс</a></button>

    <?php
    include 'DBCon.php';
    $groups = Table("groups");
    ?>
    <br>
    <?php
    foreach ($groups as $group)
        echo $group['course'] . " ";
    echo $group['classLead'] . " ";
    echo $group['groups'] . " ";
    echo $group['profession'] . "<br>";
    ?>
</body>

</html>