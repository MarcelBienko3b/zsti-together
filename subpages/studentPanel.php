<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Student panel</title>
    <link rel="stylesheet" href="../styles/pages/panel/panel.css">
</head>
<body>
<?php require '../scripts/php/snippets/nav.php' ?>
<?php
    print_r($_SESSION['student']);
?>
<div class="container">
    <ul class="student-panel-menu">
        <li id="myAcc">Moje konto</li>
        <li id="myPosts">Moje posty</li>
    </ul>
    <div class="panel-content" style="flex-basis:66%">
    <div class="myAcc">
    <p>Witam</p></div>  
    <div class="myPosts">
        <?php 
            $conn = new mysqli('localhost','root','','zsti_together_database');

            $postsQuery = '
                call getPostsForUser('.$_SESSION['student'][0].');';
            
            $result = $conn->query($postsQuery);
            echo '<br>';

            if ($result->num_rows > 0) {
                echo '<div class="posts-container">';
                while ($rows = $result->fetch_all()) {
                    foreach ($rows as $row) {
                        echo 
                            '<div class="posts-container__post post post--wide">';
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
    <a href="createPostTutor.php">Utwórz ogłoszenie</a>
    </div>
</div>


<script>
    const myAcc = document.getElementsByClassName("myAcc")[0];
    const myPosts = document.getElementsByClassName("myPosts")[0];
    myPosts.classList.add("hidden");
    function setAcc() {
        myPosts.classList.add("hidden");
        myAcc.classList.remove("hidden");
    }
    function setPosts() {
        myPosts.classList.remove("hidden");
        myAcc.classList.add("hidden");
    }
    const myAccBtn = document.getElementById('myAcc');
    const myPostsBtn = document.getElementById('myPosts');
    myAccBtn.addEventListener("click", setAcc);
    myPostsBtn.addEventListener("click", setPosts);
    
</script>
</body>
</html>