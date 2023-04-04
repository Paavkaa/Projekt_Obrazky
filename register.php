<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<?php
    require 'funkce.php';
    require 'db.php';
?>

<body class="back-red">
    <div class="card mt-8">
        <div class="card_item shadow card_line">
            <h2 class="text_center">Registrace</h2>
            <form action="" method="post">
                <input class="form_text" type="text" id="username" name="username" placeholder="Přezdívka" autofocus>
                <br>
                <span style="display:none" class="warning" id="usernameError">Zadej přezdívku</span>
                <?php
                    user();
                ?>
                <br style="display: none;" id="hideBr1">
                
                <input class="mt-2 form_text" type="text" id="email" name="email" placeholder="E-mail">
                <br>
                    <span style="display:none;" class="warning" id="mailError">Chybný email</span>
                    <br style="display: none;" id="hideBr2">

                <input class="mt-2 form_text" type="password" id="password" name="password" placeholder="Zadej heslo">
                <br>
                
                <input class="mt-2 form_text" type="password" id="password2" name="password2" placeholder="Zadej znovu heslo">
                <br>
                <span style="display: none;" class="warning" id = "passwordError">Hesla se neshodují!</span>
                <span style="display: none;" class="warning" id = "passwordLength">Heslo je krátké! Minimum je 8 znaků</span>

                <div class="mt-2 ">
                    <div class="align_center">
                        <label >Souhlasím s podmínkami</label>
                        <input class="form_check" type="checkbox" name="checkbox">
                    </div>
                
                </div>

                <div class="text_center">
                    <input class="mt-5 form_submit" type="submit" id="submit" name="submit" value="Registrovat">
                </div>

            </form>
            <div class="form_link">
                    <p>Už máš účet? <a href="login.php">Přihlaš se!</a></p>
            </div>

        </div>
    </div>


    <?php
        nav();
        foot();
    ?>

    <script src="script.js"></script>

</body>
</html>