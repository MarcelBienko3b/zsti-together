<?php
    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $selectTeacherQuery = 'select * from teachers where teacher__email = \''.$email.'\';';
    $teacher = mysqli_fetch_array(mysqli_query($conn, $selectTeacherQuery),MYSQLI_NUM);
    
    if ($teacher[4] == md5($password))
        $checkPassword = true;
    else 
        $checkPassword = false;
    if ($checkPassword) {
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $_SESSION = array();
            session_start();
            $_SESSION['student'] = '';
            $_SESSION['teacher'] = $teacher;
            echo $_SESSION['teacher'];
            header("Location: ../../subpages/teacherPanel.php");
            exit();
        }
    } else {
        echo 'Podane błędne dane logowania';
    }
?>