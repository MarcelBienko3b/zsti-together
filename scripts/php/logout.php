<?php

    session_start();

    $_SESSION['student'] = '';
    $_SESSION['teacher'] = '';

    header('Location: /zsti-together/index.html');

?>