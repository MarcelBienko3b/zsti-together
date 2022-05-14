<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="UTF-8">
        <title>ZSTI Emergency</title>

        <link rel="stylesheet" href="styles/pages/forms/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
    </head>

    <body>
        
        <div class="login">
            <form action="scripts/php/loginTeacher.php" method="post" class="login__form form">
                    <div class="form__email item">
                      <label for="email">E-mail</label><br>
                      <input type="email" class="form-control" id="email" name="email"/>
                    </div>

                    <div class="form__pass item">
                      <label for="password">Hasło</label><br>
                      <input type="password" class="form-control" id="password" name="password"/>
                    </div>

                    <input type="submit" class="form__btn item" />
            </form>
        </div>

    </body>

</html>