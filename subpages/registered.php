<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Registered</title>
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
        
        header('Location: ../index.php');

    ?>
    
</body>
</html>