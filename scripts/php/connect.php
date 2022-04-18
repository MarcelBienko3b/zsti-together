<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
    $checkPassword = password_verify($_POST['checkPassword'], $password);
    $class = $_POST['class'];

    // Database connection
    $conn = new mysqli('localhost','root','','zsti_together_database');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into tutees(tutee__firstName, tutee__lastName, tutee__email, tutee__password, tutee__class) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $password, $class);
        $execval = $stmt->execute();
        echo "Registered successfully...";
        $stmt->close();
        $conn->close();
    }

    if ($checkPassword) {
        echo "Password is correct.";
    } else {
        echo "Password is incorrect.";
    }

?>