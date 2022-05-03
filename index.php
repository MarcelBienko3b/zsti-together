<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Together</title>

        <link rel="stylesheet" href="styles/main.css">
        
    </head>

    <body>

        <?php

            session_start();
        
            function logged() {

                if ($_SESSION['student'] != '' || $_SESSION['teacher'] != '') {
                    return true;
                } else return false;

            }

            if (!logged()) {

                echo '
                    <nav class="navbar navbar--horizontal">
                        <ul class="navbar__list">
                            <li class="navbar__item">
                                <a href="register.php">Zarejestruj się</a>
                            </li>
                            <li class="navbar__item">
                                <a href="loginStudent.php">Zaloguj się jako uczeń</a>
                            </li>
                            <li class="navbar__item">
                                <a href="loginTeacher.php">Zaloguj się jako nauczyciel</a>
                            </li>
                        </ul>
                    </nav>';

            } else {

                    echo '
                    <nav class="navbar navbar--horizontal">
                        <ul class="navbar__list">
                            <li class="navbar__item">
                                <a href="scripts/php/logout.php">Wyloguj się</a>
                            </li>';
                if ($_SESSION['student'] != null) {

                    echo '
                            <li class="navbar__item">
                                <a href="studentPanel.php">Przejdź do panelu zarządzania</a>
                            </li>
                        </ul>
                    </nav>';

                } elseif ($_SESSION['teacher'] != null) {

                    echo '
                            <li class="navbar__item">
                                <a href="teacherPanel.php">Przejdź do panelu zarządzania</a>
                            </li>
                        </ul>
                    </nav>';
                        
                }

            }

        ?>

        <?php
        
            $conn = new mysqli('localhost','root','','zsti_together_database');

            $postsQuery = '
                    select 
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
                    left join classes on classes.class__id = students.student__class
                    ';
            
            $result = $conn->query($postsQuery);

            echo '<br>';

            if ($result->num_rows > 0) {
                echo '<div class="posts-container">';
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        echo 
                            '<div class="posts-container__post post">';
                                if ($row[4] == null && $row[5] == null) {
                                    echo '<h4 class="post__author">'.$row[2].' '.$row[3].' | '.$row[7].'</h2>';
                                } elseif ($row[2] == null && $row[3] == null) {
                                    echo '<h4 class="post__author">'.$row[4].' '.$row[5].'</h2>';
                                }
                            echo
                                '<h3 class="post__description">'.$row[0].'</h3>
                                <h4 class="post__subject">'.$row[1].'</h2>';
                                
                            echo
                                '<p class="post__type">'.$row[6].'</p>
                            </div>';
                        echo '<br>';
                    }
                }
                echo '</div>';
            }

        ?>

    </body>

</html>