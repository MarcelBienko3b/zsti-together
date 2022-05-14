<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Teacher panel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
</head>
<body>

<?php
    session_start();
?>

<form action="../scripts/php/passChange.php" method="post">
    Podaj stare hasło
    <input type="password" id="oldPass" name="oldPass">
    <br>
    Podaj nowe hasło
    <input type="password" id="newPass" name="newPass">
    <br>
    Powtórz nowe hasło
    <input type="password" id="checkNewPass" name="checkNewPass" onchange="checkPassword()">
    <br>
    <input type="submit" id="sendNewPass" value="Zmien haslo">
</form>
<a href="createPostTeacher.php">Utwórz ogłoszenie</a>
<script src="../scripts/js/passValidation.js"></script>
</body>
</html>