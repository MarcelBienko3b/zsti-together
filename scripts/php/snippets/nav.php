<?php

    session_start();
        
    function logged() {

        if (isset($_SESSION['student']) || isset($_SESSION['teacher'])) {
            if ($_SESSION['student'] != '' || $_SESSION['teacher'] != '') {
            return true;
            } else return false;
        } else return false;

    }

    if (!logged()) {

        echo '
            <nav class="navbar navbar--vertical">
                <ul class="navbar__list">
                    <button class="navbar__close"><< Zamknij panel</button>
                    <a class="navbar__item" href="register.php">Zarejestruj się</a>
                    <a class="navbar__item" href="loginStudent.php">Zaloguj się jako uczeń</a>
                    <a class="navbar__item" href="loginTeacher.php">Zaloguj się jako nauczyciel</a>
                </ul>
            </nav>';

    } else {

        echo '
            <nav class="navbar navbar--vertical>
                <ul class="navbar__list">
                    <button class="navbar__close"><< Zamknij panel</button>';

        if ($_SESSION['student'] != null) {

            echo '
                    <a class="navbar__item" href="subpages/studentPanel.php">Przejdź do panelu zarządzania</a>';

        } elseif ($_SESSION['teacher'] != null) {

            echo '
                    <a class="navbar__item" href="subpages/teacherPanel.php">Przejdź do panelu zarządzania</a>';

        }
        echo '
                    <a class="navbar__item" href="scripts/php/logout.php">Wyloguj się</a>
                </ul>
            </nav>';

    }

?>