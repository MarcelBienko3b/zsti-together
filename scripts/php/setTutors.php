<?php

    session_start();

    for ($i = 1; $i < $_SESSION['studentsNum']+1; $i++) {

        $arr[$i]['bool'] = intval(explode("_", $_POST["isTutor$i"])[0]);
        $arr[$i]['id'] = intval(explode("_", $_POST["isTutor$i"])[1]);

    }

    $conn = new mysqli('localhost','root','','zsti_together_database');

    $bool = 'bool';
    $id = 'id';
    
    for ($i = 1; $i < $_SESSION['studentsNum']+1; $i++) {

        $setQuery = 'update students
                    set students.student__isTutor = '.$arr[$i][$bool].'
                    where students.student__id = '.$arr[$i][$id].'';

        echo "update students
        set students.student__isTutor = $arr[$i]['bool']
        where students.student__id = $arr[$i]['id']".'<br>';

        mysqli_query($conn,$setQuery);

    }

    header("../../subpages/teacherPanel.php");
    
?>