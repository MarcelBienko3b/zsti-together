<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Emergency</title>
        
    </head>

    <body>
        
        <div class="login">
            <form action="scripts/php/loginStudent.php" method="post" class="login__form">
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="text" class="form-control" id="email" name="email"/>
                    </div>

                    <div class="form-group">
                      <label for="password">Hasło</label>
                      <input type="password" class="form-control" id="password" name="password"/>
                    </div>

                    <input type="submit" class="btn btn-primary" />
            </form>
        </div>

    </body>

</html>