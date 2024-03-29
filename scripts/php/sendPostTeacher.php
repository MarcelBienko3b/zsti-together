<?php
    session_start();
    $description = $_POST['description'];
    $subject = $_POST['subject'];
    $types = $_POST['type'];
    $teacher = $_SESSION['teacher'];
    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into posts(post__body, post__subject, post__teacher, post__type) values (?, ?, ?, ?)");
        $stmt->bind_param("siii", $description, $subject, $teacher, $types);
        $execval = $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: ../../subpages/teacherPanel.php");
        exit();
    }
?>