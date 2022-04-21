<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Emergency</title>
        
    </head>

    <body>
        
        <div class="login">
            <form action="scripts/php/connect.php" method="post" class="login__form">

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

                          $dropdown_class_select = new mysqli('localhost','root','','zsti_together_database');
                          $classNum = mysqli_query($dropdown_class_select, 'select * from classes');
                          $class_table = array();
                          while ($row = mysqli_fetch_array($classNum, MYSQLI_NUM)) {
                            $class_table[$row[1]] = $row[2];
                          }

                          foreach ($class_table as $key => $class) {
                            echo '<option value=' . $key . '>' . $key . '</option>';
                          }

                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="tutor">Chcę zostać pomagającym</label>
                      <input type="checkbox" class="form-control" id="tutor" name="tutor"/>
                    </div>

                    <input type="submit" class="btn btn-primary" />
            </form>
        </div>

    </body>

</html>