<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Nowe ogłoszenie</title>

    <link rel="stylesheet" href="/styles/pages/forms/newPost.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

<div class="createPost">
    <form action="../scripts/php/sendPostTeacher.php" method="post" class="post_form">

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea type="textarea" maxlength="255" class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">

            <label for="subject">Przedmiot</label>
            <select id="subject" name="subject">

            <?php

                $db_login = new mysqli('localhost','root','','zsti_together_database');
                $classQuery = mysqli_query($db_login, 'select * from subjects');
                $class_arr = array();

                while ($row = mysqli_fetch_array($classQuery, MYSQLI_NUM)) {
                    $class_arr[$row[0]] = $row[1];
                }

                foreach ($class_arr as $key => $id) {
                    echo '<option value=' . $key . '>' . $id . '</option>';
                }

            ?>

            </select>

        </div>

        <div class="form-group">

            <label for="type">Typ zajęć</label>
            <select id="type" name="type">

            <?php

                $db_login = new mysqli('localhost','root','','zsti_together_database');
                $classQuery = mysqli_query($db_login, 'select * from types');
                $class_arr = array();

                while ($row = mysqli_fetch_array($classQuery, MYSQLI_NUM)) {
                    $class_arr[$row[0]] = $row[1];
                }

                foreach ($class_arr as $key => $id) {
                    echo '<option value=' . $key . '>' . $id . '</option>';
                }

            ?>

            </select>

        </div>

        <input type="submit" class="btn btn-primary" />
    </form>
</div>
    
</body>
</html>