<?php

    session_start();

    $_SESSION['student'] = '';
    $_SESSION['teacher'] = '';

    header('Location: /index.html');

?>