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

    <form action="../scripts/php/unsubscribe.php" method="POST">
        <input type="hidden" name="postId" value="<?php echo $_GET['postId'];?>">
        Dlaczego chcesz zrezygnować z zajęć?</br>
        <textarea></textarea></br>
        <input type="submit" value="Zgłoś się">
    </form>

</body>
</html>