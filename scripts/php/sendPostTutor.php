<?php
    session_start();
    $description = $_POST['description'];
    $subject = $_POST['subject'];
    $types = $_POST['type'];
    $student = $_SESSION['student'][0];
    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into posts(post__body, post__subject, post__tutor, post__type) values (?, ?, ?, ?)");
        $stmt->bind_param("siii", $description, $subject, $student, $types);
        $execval = $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: ../../subpages/studentPanel.php");
        exit();
    }
?>