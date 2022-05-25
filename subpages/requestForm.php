<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zgłoszenie</title>
</head>
<body>

    <?php
        session_start();
    ?>

    <form action="../scripts/php/request.php" method="POST">
        <input type="hidden" name="postId" value="<?php echo $_GET['postId'];?>">
        Uwagi i pytania</br><textarea></textarea></br>
        <input type="submit" value="Zgłoś się">
    </form>

</body>
</html>