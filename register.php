<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Emergency</title>

        <link rel="stylesheet" href="styles/pages/forms/register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
    </head>

    <body>
        
        <div class="login">
            <form action="scripts/php/sendNewStudent.php" method="post" class="login__form form">

                    <div class="form__firstName item">
                      <label for="firstName">Imię</label><br>
                      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Jan" required/>
                    </div>

                    <div class="form__lastName item">
                      <label for="lastName">Nazwisko</label><br>
                      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Kowalski" required/>
                    </div>

                    <div class="form__email item">
                      <label for="email">E-mail</label><br>
                      <input type="email" class="form-control" id="email" name="email" placeholder="jan.kowalski@example.pl" required/>
                    </div>

                    <div class="form__pass item">
                      <label for="password">Hasło</label><br>
                      <input type="password" class="form-control" id="password" name="password" placeholder="********" required/>
                    </div>

                    <div class="form__checkPass item">
                      <label for="checkPassword">Powtórz hasło</label><br>
                      <input type="password" class="form-control" id="checkPassword" name="checkPassword" placeholder="********" required/>
                    </div>

                    <div class="form__class item">
                      <label for="class">Klasa</label><br>
                      <select id="class" name="class">
                        <?php

                          $db_login = new mysqli('localhost','root','','zsti_together_database');
                          $classQuery = mysqli_query($db_login, 'select * from classes');
                          $class_arr = array();
                          while ($row = mysqli_fetch_array($classQuery, MYSQLI_NUM)) {
                            $class_arr[$row[0]] = $row[1];
                          }

                          foreach ($class_arr as $key => $id) {
                            echo '<option value=' . $key . '>' . $id . '</option>';
                          }

                        ?>
                      </select>
                    </div>

                    <input type="submit" class="form__btn item" />
            </form>
        </div>

    </body>

</html>