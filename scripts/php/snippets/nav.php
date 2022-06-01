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
        
        header('Location: index.html');

    } else {

        $url = $_SERVER['REQUEST_URI'];

        if ($url == '/zsti-together/subpages/studentPanel.php' || $url == '/zsti-together/subpages/teacherPanel.php') {

                echo '
                <nav class="navbar navbar--horizontal">
                    <ul class="navbar__list">
                        <a class="navbar__item" href="/zsti-together/scripts/php/logout.php">Wyloguj się</a>
                        <a class="navbar__item" href="/zsti-together/scripts/php/snippets/displayNotifications.php"><img src="/zsti-together/images/icons/notification_bell.png"></a>
                        <a class="navbar__item" href="/zsti-together/posts.php">Powrót do strony głównej</a>
                    </ul>
                </nav>';

        } else {

                echo '
                <nav class="navbar navbar--horizontal">
                    <ul class="navbar__list">
                        <a class="navbar__item" href="/zsti-together/scripts/php/logout.php">Wyloguj się</a>
                        <a class="navbar__item" href="/zsti-together/scripts/php/snippets/displayNotifications.php"><img src="/zsti-together/images/icons/notification_bell.png"</a>';

            if ($_SESSION['student'] != null) {

                echo '
                        <a class="navbar__item" href="/zsti-together/subpages/studentPanel.php">Przejdź do panelu zarządzania</a>';

            } elseif ($_SESSION['teacher'] != null) {

                echo '
                        <a class="navbar__item" href="/zsti-together/subpages/teacherPanel.php">Przejdź do panelu zarządzania</a>';

            }
            echo '
                    </ul>
                </nav>';

        }

    }

?>