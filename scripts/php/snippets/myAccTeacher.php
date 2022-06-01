<h2>
<?php 
    echo $_SESSION["teacher"][1].' '.$_SESSION["teacher"][2];
?>
</h2>
</br>
</br>
<h3>Zmień hasło</h3>
<div class="login">
<form action="../subpages/teacherPanel.php" method="post">
    Podaj stare hasło
    <input type="password" id="oldPass" name="oldPass">
    <br>
    Podaj nowe hasło
    <input type="password" id="newPass" name="newPass">
    <br>
    Powtórz nowe hasło
    <input type="password" id="checkNewPass" name="checkNewPass" onchange="checkPassword()">
    <br>
    <input type="submit" id="sendNewPass" value="Zmien haslo">
</form>
<?php 
    if(isset($_POST['oldPass'])) {
        $email=$_SESSION['teacher'][3];
        $conn = new mysqli('localhost','root','','zsti_together_database');
        $passQuery="select teacher__password from teachers where teacher__email=\"".$email."\";";
        $pass = mysqli_fetch_array(mysqli_query($conn,$passQuery),MYSQLI_NUM);
        if(md5($_POST['oldPass'])==$pass[0]) {
            $changePassQuery='update teachers set teacher__password="'.md5($_POST['newPass']).'" where teacher__id='.$_SESSION['teacher'][0].';';
            if($_POST['newPass']==$_POST['checkNewPass']) {
                mysqli_query($conn,$changePassQuery);
                echo 'Hasło zostało zmienione pomyślnie';
            }
        } else {
            echo 'Podales złe stare haslo';
        }
    }

?>
<script src="../scripts/js/passValidation.js"></script>