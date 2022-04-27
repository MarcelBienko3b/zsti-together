<?php
session_start();
if($_SESSION['student']=='') {
    $email=$_SESSION['teacher'][3];
    $conn = new mysqli('localhost','root','','zsti_together_database');
    $passQuery="select teacher__password from teachers where teacher__email=\"".$email."\";";
    $pass = mysqli_fetch_array(mysqli_query($conn,$passQuery),MYSQLI_NUM);
    if(md5($_POST['oldPass'])==$pass) {
        echo 'siema';
    } else {
        echo 'Podales zle stare haslo';
        header("refresh:3,http://127.0.0.1/subpages/teacherPanel.php");
    }
}
?>