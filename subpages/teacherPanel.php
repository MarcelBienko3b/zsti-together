<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Teacher panel</title>
    
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
<script src="../scripts/js/passValidation.js"></script>
</body>
</html>