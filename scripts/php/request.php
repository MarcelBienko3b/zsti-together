<?php 
    session_start();
    //echo $_POST['postId'];
    //print_r($_SESSION['student']);
    $conn = new mysqli('localhost','root','','zsti_together_database');
    if($_SESSION['student'])
    $addQuery = " insert into requests(request__post,request__student) values (".$_POST['postId'].",".$_SESSION['student'][0].");";
    else 
    $addQuery = " insert into requests(request__post,request__student) values (".$_POST['postId'].",".$_SESSION['teacher'][0].");";
    echo $addQuery;
    mysqli_query($conn, $addQuery);
    header("Location: ../../posts.php");
?> 