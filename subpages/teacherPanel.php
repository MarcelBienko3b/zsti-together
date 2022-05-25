<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Teacher panel</title>
    <link rel="stylesheet" href="../styles/pages/panel/panel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
</head>
<body>
<?php require '../scripts/php/snippets/nav.php' ?>
<div class="container">
    <ul class="panel-menu">
        <li id="myAcc">Moje konto</li>
        <li id="myPosts">Moje posty</li>
        <li id="addTutors">Dodaj tutora</li>
    </ul>
    <div class="panel-content">
        
        <div class="myPosts">

            <?php echo '<a href="createPostTutor.php">Utwórz ogłoszenie</a>' ?>

            <?php 
                $conn = new mysqli('localhost','root','','zsti_together_database');

                $postsQuery = '
                    call getPostsForUser('.$_SESSION['teacher'][0].');';
                    
                $result = $conn->query($postsQuery);
                echo '<br>';

                if ($result->num_rows > 0) {
                    echo '<div class="posts-container">';
                    while ($rows = $result->fetch_all()) {
                        foreach ($rows as $row) {
                            echo 
                                '<div class="posts-container__post post post--wide">';
                                if ($row[4] == null && $row[5] == null) {
                                    echo '
                                    <h4 class="post__author">'.$row[2].' '.$row[3].' | '.$row[7].'</h4>';
                                } elseif ($row[2] == null && $row[3] == null) {
                                    echo '
                                    <h4 class="post__author">'.$row[4].' '.$row[5].'</h4>';
                                }
                                echo '
                                    <h3 class="post__description">'.$row[0].'</h3>
                                    <h4 class="post__subject">'.$row[1].'</h4>
                                    <p class="post__type">'.$row[6].'</p>
                                </div>';
                            echo '<br>';
                        }
                    }
                    echo '</div>';
                }
            ?>

        </div>

        <div class="addTutors">
            <?php
                $conn = new mysqli('localhost','root','','zsti_together_database');
                $listQuery = 'select class__name, student__id, student__firstName, student__lastName, student__isTutor 
                            from students
                            inner join classes on class__id = student__class;';
                $result = $conn->query($listQuery);

                if ($result->num_rows > 0) {
                    echo '<form class="list-form">
                            <table>';
                    while ($rows = $result->fetch_all()) {
                        foreach ($rows as $row) {
                            echo '<tr>';
                            echo '<td>'.$row[0].'</td>
                                <td>'.$row[2].'</td>
                                <td>'.$row[3].'</td>
                                <td><input type="checkbox" id="isTutor" name="isTutor"';
                                if ($row[4]) echo 'checked="true"';
                                echo '></td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                    echo '<input type="submit" value="Zapisz"></form>';
                }
            ?>
        </div>

        <div class="myAcc">
            <?php require '../scripts/php/snippets/myAccTeacher.php' ?>
        </div>

    </div>
</div>


<script>
    const myAcc = document.getElementsByClassName("myAcc")[0];
    const myPosts = document.getElementsByClassName("myPosts")[0];
    const addTutors = document.getElementsByClassName("addTutors")[0];
    myPosts.classList.add("hidden");
    addTutors.classList.add("hidden");
    function setAcc() {
        myPosts.classList.add("hidden");
        addTutors.classList.add("hidden");
        myAcc.classList.remove("hidden");
    }
    function setPosts() {
        myPosts.classList.remove("hidden");
        addTutors.classList.add("hidden");
        myAcc.classList.add("hidden");
    }
    function setTutors() {
        myPosts.classList.add("hidden");
        addTutors.classList.remove("hidden");
        myAcc.classList.add("hidden");

    }
    const myAccBtn = document.getElementById('myAcc');
    const myPostsBtn = document.getElementById('myPosts');
    const addTutorsBtn = document.getElementById('addTutors');
    myAccBtn.addEventListener("click", setAcc);
    myPostsBtn.addEventListener("click", setPosts);
    addTutorsBtn.addEventListener("click", setTutors);
    
</script>
</body>
</html>