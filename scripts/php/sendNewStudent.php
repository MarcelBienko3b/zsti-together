<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if ($_POST['checkPassword'] == $_POST['password']) {
        $checkPassword = true;
    } else {
        $checkPassword = false;
    }
    $class = $_POST['class'];

    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    if ($checkPassword) {
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $stmt = $conn->prepare("insert into students(student__firstName, student__lastName, student__email, student__password, student__class) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $class);
            $execval = $stmt->execute();
            $stmt->close();
            $conn->close();

            header("Location: ../../subpages/registered.php");
            exit();
        }
    } else {
        echo 'Twoje hasła się różnią';
    }

?>