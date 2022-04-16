<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);

    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into zsti_users(user__firstName, user__lastName, user__email, user__password) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
        $execval = $stmt->execute();
        echo "Registered successfully...";
        $stmt->close();
        $conn->close();
    }

?>