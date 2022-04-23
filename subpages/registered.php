<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Registered</title>
</head>
<body>

    <?php

        session_start();
        
        $display_tutors = new mysqli('localhost','root','','zsti_together_database');
        $tutors_query = '
            select tutors.tutor__id, students.student__firstName, students.student__lastName, classes.class__name, subjects.subject__name from tutors
            inner join students on students.student__id = tutors.tutor__id
            inner join classes on classes.class__id = students.student__class
            inner join subjects on subjects.subject__id = tutors.tutor__subject;
        ';

        if ($stmt = mysqli_prepare($display_tutors, $tutors_query)) {

            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $tutor__id, $firstName, $lastName, $class, $subject);

            while (mysqli_stmt_fetch($stmt)) {
                $_SESSION['tutor_id'] = $tutor__id;
                $_SESSION['first_name'] = $firstName;
                $_SESSION['last_name'] = $lastName;
                $_SESSION['class'] = $class;
                $_SESSION['subject'] = $subject;

                printf("%s %s | %s - %s", $firstName, $lastName, $class, $subject);
                echo '<br>';
            }

            mysqli_stmt_close($stmt);

        }

        mysqli_close($display_tutors);

        echo '<br>';
        print_r($_SESSION);

    ?>
    
</body>
</html>