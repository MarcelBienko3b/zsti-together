<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Together</title>
        
    </head>

    <body>

        <a href="register.php">Zarejestruj się</a>
        <a href="loginStudent.php">Zaloguj się jako uczeń</a>
        <a href="loginTeacher.php">Zaloguj się jako nauczyciel</a>

        <?php
        
            $conn = new mysqli('localhost','root','','zsti_together_database');

            $postsQuery = 'select 
                        posts.post__body,
                        subjects.subject__name,
                        students.student__firstName,
                        students.student__lastName,
                        teachers.teacher__firstName,
                        teachers.teacher__lastName,
                        types.type__name,
                        classes.class__name
                    from posts 
                    inner join subjects on subjects.subject__id = posts.post__subject
                    left join students on students.student__id = posts.post__tutor
                    left join teachers on teachers.teacher__id = posts.post__teacher
                    inner join types on types.type__id = posts.post__type
                    left join classes on classes.class__id = students.student__class';
            
            $result = $conn->query($postsQuery);

            echo '<br>';

            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        echo 
                            '<div class="post">

                                <h3 class="description">'.$row[0].'</h3>
                                <h4 class="subject">'.$row[1].'</h2>';
                                if ($row[4] == null && $row[5] == null) {
                                    echo '<h4 class="tutor">'.$row[2].' '.$row[3].' | '.$row[7].'</h2>';
                                } else {
                                    echo '<h4 class="teacher">'.$row[4].' '.$row[5].'</h2>';
                                }
                            echo
                                '<p class="type">'.$row[6].'</p>
                            </div>';
                        echo '<br>';
                    }
                }
            }

        ?>

    </body>

</html>