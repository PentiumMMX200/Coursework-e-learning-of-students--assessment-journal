<? include 'DBCon.php'; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    include 'header.php';
    ?>
</head>

<body>
    <?php
    include 'sidebar.php';
    ?>

    <?php
    $groups = Table("groups");
    ?>
    <br>
    <?php
    foreach ($groups as $group) {
        echo $group['course'] . " ";
        echo $group['classLead'] . " ";
        echo $group['groups'] . " ";
        echo $group['profession'] . "<br>";
    }
    ?>

    <script src="/script.js"></script>
</body>

</html>