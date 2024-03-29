<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Together</title>

        <link rel="stylesheet" href="styles/pages/posts/posts.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
    </head>

    <body>

        <?php require 'scripts/php/snippets/nav.php' ?>

        <?php
        
            $conn = new mysqli('localhost','root','','zsti_together_database');
            if($_SESSION['teacher']) {
                $postsQuery = '
                    select 
                        posts.post__body,
                        subjects.subject__name,
                        students.student__firstName,
                        students.student__lastName,
                        teachers.teacher__firstName,
                        teachers.teacher__lastName,
                        types.type__name,
                        classes.class__name,
                        posts.post__id
                    from
                        posts 
                    inner join
                        subjects on subjects.subject__id = posts.post__subject
                    left join
                        students on students.student__id = posts.post__tutor
                    left join
                        teachers on teachers.teacher__id = posts.post__teacher
                    inner join
                        types on types.type__id = posts.post__type
                    left join
                        classes on classes.class__id = students.student__class
                    order by
                        posts.post__id desc';

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
                                            '<hr class="post__hr">
                                            <h3 class="post__description">'.$row[0].'</h3>
                                            <hr class="post__hr">
                                            <h4 class="post__subject">'.$row[1].'</h2>';
                                            
                                        echo
                                            '<p class="post__type">'.$row[6].'</p>'?>
                                        <?php echo '</div>';
                                }
                            }
                            echo '</div>';
                        }
            
            
            } else {
                $myPostsQuery = '
                    call userPosts('.$_SESSION['student'][0].');';
            
                $result = $conn->query($myPostsQuery);
                echo '<br>';
                echo '<h1>Twoje wydarzenia</h1>';
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
                                    '<hr class="post__hr">
                                    <h3 class="post__description">'.$row[0].'</h3>
                                    <hr class="post__hr">
                                    <h4 class="post__subject">'.$row[1].'</h2>';
                                    
                                echo
                                    '<p class="post__type">'.$row[6].'</p>'?>
                                    <div class="post__more" id="post__<?php echo $row[8] ?>"><a href="/zsti-together/scripts/php/unsubscribe.php?postId=<?php echo $row[8] ?>">Wypisz się</a></div>
                                <?php echo '</div>';
                        }
                    }
                
                    echo '</div>';
                }
                echo '<h1>Inne wydarzenia</h1>';
                $conn = new mysqli('localhost','root','','zsti_together_database');
                $myPostsQuery = '
                call notUserPosts('.$_SESSION['student'][0].');';
        
                $result = $conn->query($myPostsQuery);
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
                                    '<hr class="post__hr">
                                    <h3 class="post__description">'.$row[0].'</h3>
                                    <hr class="post__hr">
                                    <h4 class="post__subject">'.$row[1].'</h2>';
                                    
                                echo
                                    '<p class="post__type">'.$row[6].'</p>'?>
                                    <div class="post__more" id="post__<?php echo $row[8] ?>"><a href="/zsti-together/scripts/php/request.php?postId=<?php echo $row[8] ?>">Zapisz się</a></div>
                                <?php echo '</div>';
                        }
                    }
                
                    echo '</div>';
                }
            }

        ?>

        

    </body>

</html>