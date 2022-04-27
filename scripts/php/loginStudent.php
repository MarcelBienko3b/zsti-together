<?php
    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $selectStudentQuery = 'select * from students where student__email = \''.$email.'\';';
    $student = mysqli_fetch_array(mysqli_query($conn, $selectStudentQuery),MYSQLI_NUM);
    
    if ($student[4] == md5($password))
        $checkPassword = true;
    else 
        $checkPassword = false;
    if ($checkPassword) {
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            session_start();
            $_SESSION['teacher'] = '';
            $_SESSION['student'] = $student;
            echo $_SESSION['student'];
            header("Location: ../../subpages/studentPanel.php");
            exit();
        }
    } else {
        echo 'Podane błędne dane logowania';
    }
?>