<?php
if ($_COOKIE['log'] == '57cf2b9f8119f28d6ede2871decad55b851626be') {
    header('Location: ./Admin/Admin.php');
}
?>
<?php include './includes/DBCon.php'; ?>
<?php include './includes/header.php'; ?>
<div class="wrapper">
    <?php include './functions/visible/sidebar.php'; ?>
    <div class="content">
        <?php include './functions/visible/tabs.php'; ?>
    </div>
</div>
<?php include './includes/footer.php'; ?>