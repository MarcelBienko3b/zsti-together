<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zgłoszenie</title>
</head>
<body>

    <?php
        session_start();
        print_r($_SESSION['clickedPost']);
    ?>

    <form action="scripts/php/request.php" method="POST">

    </form>

</body>
</html>