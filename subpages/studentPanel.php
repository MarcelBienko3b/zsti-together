<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Student panel</title>
</head>
<body>

<?php
    session_start();
    print_r($_SESSION['student']);
?>

<a href="createPost.php">Utwórz ogłoszenie</a>
    
</body>
</html>