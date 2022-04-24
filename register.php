<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Emergency</title>
        
    </head>

    <body>
        
        <div class="login">
            <form action="scripts/php/sendNewStudent.php" method="post" class="login__form">

                    <div class="form-group">
                      <label for="firstName">Imię</label>
                      <input type="text" class="form-control" id="firstName" name="firstName"/>
                    </div>

                    <div class="form-group">
                      <label for="lastName">Nazwisko</label>
                      <input type="text" class="form-control" id="lastName" name="lastName"/>
                    </div>

                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email"/>
                    </div>

                    <div class="form-group">
                      <label for="password">Hasło</label>
                      <input type="password" class="form-control" id="password" name="password"/>
                    </div>

                    <div class="form-group">
                      <label for="checkPassword">Powtórz hasło</label>
                      <input type="password" class="form-control" id="checkPassword" name="checkPassword"/>
                    </div>

                    <div class="form-group">
                      <label for="class">Klasa</label>
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

                    <input type="submit" class="btn btn-primary" />
            </form>
        </div>

    </body>

</html>