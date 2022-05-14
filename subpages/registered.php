<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Registered</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

    <?php

        session_start();
        
        $db_login = new mysqli('localhost','root','','zsti_together_database');
        $students_query = '
            select  students.student__id,
                    students.student__firstName,
                    students.student__lastName,
                    classes.class__name
            from students
            inner join classes
            on students.student__class=classes.class__id;
        ';
        if ($studentResults = mysqli_query($db_login, $students_query)) {

            $students=array();
            while ($row = mysqli_fetch_array($studentResults, MYSQLI_NUM)) {
                $students[$row[0]] = $row;
            }

        }

        header('Location: ../posts.php');

    ?>
    
</body>
</html>