<?php

    session_start();
        
    function logged() {

        if ($_SESSION['student'] != '' || $_SESSION['teacher'] != '') {
           return true;
        } else return false;

    }

    if (!logged()) {

        echo '
            <nav class="navbar navbar--horizontal">
                <ul class="navbar__list">
                    <li class="navbar__item">
                        <a href="register.php">Zarejestruj się</a>
                    </li>
                    <li class="navbar__item">
                        <a href="loginStudent.php">Zaloguj się jako uczeń</a>
                    </li>
                    <li class="navbar__item">
                        <a href="loginTeacher.php">Zaloguj się jako nauczyciel</a>
                    </li>
                </ul>
            </nav>';

    } else {

            echo '
            <nav class="navbar navbar--horizontal">
                <ul class="navbar__list">
                    <li class="navbar__item">
                        <a href="scripts/php/logout.php">Wyloguj się</a>
                    </li>';
        if ($_SESSION['student'] != null) {

            echo '
                    <li class="navbar__item">
                        <a href="studentPanel.php">Przejdź do panelu zarządzania</a>
                    </li>
                </ul>
            </nav>';

        } elseif ($_SESSION['teacher'] != null) {

            echo '
                    <li class="navbar__item">
                        <a href="teacherPanel.php">Przejdź do panelu zarządzania</a>
                    </li>
                </ul>
            </nav>';
                        
        }

    }

?>