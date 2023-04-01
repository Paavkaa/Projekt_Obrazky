<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body class="back-red">
    <div class="card mt-8">
        <div class = "card_item shadow card_line mt-3" >
            <h2 class="text_center">Přihlásit</h2>
            <form action="login.php" method="post">
                <input class="form_text" type="text" name="username" placeholder="Přezdívka">
                <br>
                <input class="mt-2 form_text" type="password" name="password" placeholder="Heslo">
                <br>
                <div class="text_center">
                    <input class="mt-5 form_submit" type="submit" name="submit" value="Přihlásit">
                </div>
            </form>            
            <div class="form_link">
                    <p>Ještě nemáš účet? <a href="register.php">Vytvoř si ho!</a></p>
            </div>
        </div>
    </div>
    <?php
        require 'funkce.php';
        nav();
        foot();
    ?>
</body>
</html>