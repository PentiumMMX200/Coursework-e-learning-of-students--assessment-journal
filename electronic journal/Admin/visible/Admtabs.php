<div class="tabContent">
    <div class="navTabs">
        <div class="tabsitems">
            <div class="tabsBtn tabsBtn-active">Добавить учащегося</div>
            <div class="tabsBtn">Добавить преподавателя</div>
            <div class="tabsBtn">Выход из аккаунта</div>
        </div>
        <div class="tabsBody">
            <div class="tabs">
                <button class="S_createFormnBtn" title='Добавить' type=''>Добавить учащегося</button>
                <div class="S_createForm">
                    <form action="./adminupdate.php" class="crteStudentForm">
                        <input class="setSurname" name="S_Surname" placeholder="Фамилия">
                        <input class="setFirstname" name="S_Firstname" placeholder="Имя">
                        <input class="setPatronymic" name="S_Patronymic" placeholder="Отчество">
                        <input class="setGroup" name="S_group" placeholder="Группа">
                        <button type="submit">Добавить студента</button>
                    </form>
                </div>
                <button class="S_delFormBtn" title='Удалить' type=''>Удалить учащегося</button>
                <div class="S_deleteForm">
                    <form action="./adminupdate.php" class="delStudentForm">
                        <input class="delSurname" name="S_Surname" placeholder="Фамилия">
                        <input class="delFirstname" name="S_Firstname" placeholder="Имя">
                        <input class="delPatronymic" name="S_Patronymic" placeholder="Отчество">
                        <button type="submit">Удалить студента</button>
                    </form>
                </div>
                <script src="./adminscript.js"></script>
            </div>
            <div class="tabs">
                Мы группы
            </div>
            <div class="tabs">
                Хотите выйти?
                <br>
                <a href="./functions/exit.php">Да</a>
            </div>
        </div>
    </div>
</div>
<script src="../tabs.js"></script>