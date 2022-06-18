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
                        <option disabled selected value>Выберите предмет</option>
                        <?php
                        foreach ($groupsSelect as $subject => $groups) : ?>
                        <option value="<?php echo $subject; ?>">
                            <?php echo $subject; ?>
                        </option>
                        <?php endforeach ?>
                    </select>

                    <?php
                    $counter = 0;
                    foreach ($groupsSelect as $subject => $groups) :
                        if ($counter == 0) { ?>
                    <select class='selectFormGroup ' name='<?php echo $subject; ?>'>
                        <option disabled selected value>Выберите группу</option>
                        <?php } else { ?>
                        <select class='selectFormGroup selectFormGroup-disable ' name='<?php echo $subject; ?>'>
                            <?php }
                            foreach ($groups as $group) : ?>
                            <option value="<?php echo $group; ?>">
                                <?php echo $group; ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <?php
                            $counter++;
                        endforeach ?>
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
                <div class='row rowFP'>
                    <div class='familiya'>
                        <?=
                            $student['S_Surname'];
                            ?>
                    </div>
                    <?php foreach ($marks as $mark) {
                            if ($student['S_id'] == $mark['S_id']) { ?>
                    <div class='poseshenieOcenki' data-date='<?= $mark['M_Date']; ?>' data-id="<?= $mark['M_id']; ?>"
                        data-mark="<?= $mark['M_Mark'] ?>">
                        <?= $mark['M_Attendance']; ?><?= $mark['M_Mark']; ?>
                    </div>
                    <?php }
                        } ?>
                </div>
                <?php } ?>
            </div>
            <form action="./markupdate.php" class='editForm'>
                <input class="hiddenIdInput editFormRows" name='M_id' type="hidden">
                <input class="markInput" name="Markinput" type="hidden">
                <select class="markUpdateSelector editFormRows" name="markEditAction">
                    <option disabled selected value>Выберите опцию</option>
                    <option class="markUpdateOption" value="Edit">Изменить</option>
                    <option class="markUpdateOption" value="Delete">Удалить</option>
                </select>
                <div class="editingMarkDispaly">
                    <select class="markChange editFormRows" name="M_Mark">
                        <option disabled selected value>Оценка</option>
                        <option class="MarkChoose" name="markValue" value="2">2</option>
                        <option class="MarkChoose" name="markValue" value="3">3</option>
                        <option class="MarkChoose" name="markValue" value="4">4</option>
                        <option class="MarkChoose" name="markValue" value="5">5</option>
                    </select>
                    <div class="attendanceCheck">
                        <input type="checkbox" id="Attendance" class="markChange editFormRows" name="M_Attendance"
                            value="ОТ">
                        <label for="Attendance"> Отсутствовал?</label>
                    </div>
                    <button class="confirmButton" type='submit'>Сохранить</button>
                </div>
            </form>
            <button class="createFormnBtn" title='Редактировать' type=''>&#9998;</button>
            <div class="createForm">
                <form action="./markupdate.php" class="createMarkForm">
                    <input name='markCreate' value="Create" hidden>
                    </select>
                    <select class="setSurname" name="S_id">
                        <option disabled selected value>Выберите Фамилию</option>
                        <?php
                        foreach ($students as $student) :
                        ?>
                        <option value="<?php echo $student['S_id'] ?>"><?php echo $student['S_Surname'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <select class="markСreate" name="M_Mark">
                        <option disabled selected value>Оценка</option>
                        <option class="MarkChoose" name="markValue" value="2">2</option>
                        <option class="MarkChoose" name="markValue" value="3">3</option>
                        <option class="MarkChoose" name="markValue" value="4">4</option>
                        <option class="MarkChoose" name="markValue" value="5">5</option>
                    </select>
                    <input class="subjectInput" name="M_study_subs" type="hidden">
                    <input class="groupInput" name="G_group" type="hidden">
                    <input class="createDate" type="date" name="M_Date">
                    <button type="submit">Внести изменения</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="/journal.js"></script>
<?php
include '../includes/footer.php';
?>