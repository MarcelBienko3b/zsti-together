<?php 
    session_start();
    //echo $_POST['postId'];
    //print_r($_SESSION['student']);
    $conn = new mysqli('localhost','root','','zsti_together_database');
    $delQuery = " delete from requests where request__post=".$_POST['postId']." and request__student =".$_SESSION['student'][0].";";
    mysqli_query($conn, $delQuery);
    header("Location: ../../posts.php");
?> 