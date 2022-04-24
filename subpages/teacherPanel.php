<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Teacher panel</title>
</head>
<body>

<?php
    session_start();
    print_r($_SESSION['teacher']);
    print_r($_SESSION['student']);
?>
    
</body>
</html>