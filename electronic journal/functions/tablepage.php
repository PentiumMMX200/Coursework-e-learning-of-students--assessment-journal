<?php
include '../includes/DBCon.php';
include '../includes/header.php';
include '../functions/visible/sidebar.php';
?>
<div class="wrapper">
    <div class="content">
        <div class="journalMain">
            <?php
            $logins =  $db->prepare("SELECT * FROM `login`");
            $logins->execute();
            $logins = $logins->fetchAll(PDO::FETCH_DEFAULT);

            foreach ($logins as $login) {

                if (hash('ripemd160', $login['name'] . 'dfg324') == $_COOKIE['log']) {

                    $idprepoda = $login['idprepoda'];

                    break;
                }
            }

            $views = $db->prepare("SELECT * FROM `study subjects` WHERE `Ss_Teacher` = :idprepoda");
            $views->execute(array(":idprepoda" => $idprepoda));
            $views = $views->fetchAll(PDO::FETCH_DEFAULT);


            $groupsSelect = [];
            foreach ($views as $view) {
                if (!$groupsSelect[$view['Ss_Subject_name']]) {
                    $groupsSelect[$view['Ss_Subject_name']] = [$view['Ss_group']];
                } else {
                    $groupsSelect[$view['Ss_Subject_name']][] = $view['Ss_group'];
                }
            }
            ?>

            <div class="selectorWrapper">
                <form class='formSelectItems'>
                    <select class='selectFormSub' name='Ss_Subject_name'>
                        <?php
                        foreach ($groupsSelect as $subject => $groups) : ?>
                        <option value="<?php echo $subject; ?>">
                            <?php echo $subject; ?>
                        </option>
                        <?php endforeach ?>
                    </select>

                    <?php foreach ($groupsSelect as $subject => $groups) : ?>
                    <select class='selectFormGroup' name='<?php echo $subject; ?>'>
                        <?php foreach ($groups as $group) : ?>
                        <option value="<?php echo $group; ?>">
                            <?php echo $group; ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <?php endforeach ?>
                    <input type="submit" value="Выбрать предмет">
                </form>
                <br>
            </div>


            <?php
            $predmet = $_GET["Ss_Subject_name"];
            $gruppa = $_GET[$predmet];

            $groups = $db->prepare("SELECT * FROM `groups` WHERE `G_group` = :group");
            $groups->execute(array(":group" => $gruppa));
            $groups = $groups->fetchAll(PDO::FETCH_DEFAULT);



            $students = $db->prepare("SELECT * FROM `students` WHERE `S_group`= :gruppa");
            $students->execute(array(":gruppa" => $gruppa));
            $students = $students->fetchAll(PDO::FETCH_DEFAULT);



            $marks = $db->prepare("SELECT * FROM `marks` WHERE `G_group` = :student AND `M_study_subs` =:views");
            $marks->execute(array(":student" => $gruppa, ":views" => $predmet));
            $marks = $marks->fetchAll(PDO::FETCH_DEFAULT);
            ?>
            <div class='wrapperocenki'>
                <div class="row dateRow">
                </div>
                <?php
                foreach ($students as $student) {
                ?>
                <div class='row'>
                    <div class='familiya'>
                        <?=
                            $student['S_Surname'];
                            ?>
                    </div>
                    <?php foreach ($marks as $mark) {
                            if ($student['S_id'] == $mark['S_id']) { ?>
                    <div class='poseshenieOcenki' data-date='<?= $mark['M_Date']; ?>' onclick="editForm()">
                        <?= $mark['M_Attendance']; ?><?= $mark['M_Mark']; ?>
                    </div>
                    <?php }
                        } ?>
                </div>
                <?php } ?>
            </div>
            <from action="./markupdate.php">

            </from>
        </div>
    </div>
</div>
<script src="/journal.js"></script>
<?php
include '../includes/footer.php';
?>