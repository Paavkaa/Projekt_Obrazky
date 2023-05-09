<?php
require 'funkce.php';
require 'db_register.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>

<body class="back_red">
<div class="align_center justify_center">
    <?php
        nav();
    ?>
    <div class="container">
        <div class="card_form shadow card_line">
            <h2 class="text_center">Registrace</h2>
            <form action="" class="column" method="post">
                <input class="form_text" type="text" id="username" name="username" placeholder="Přezdívka" autofocus>
                <?php
                        if(isset($_SESSION['error1']))
                        {
                            echo '<div class="warning">'.$_SESSION['error1'].'</div>';
                            unset($_SESSION['error1']);
                        }
                ?>
                <div style="display:none" class="warning" id="usernameError">Zadej přezdívku</div>
                
                <input class="mt-2 form_text" type="text" id="email" name="email" placeholder="E-mail">
                <?php
                    if(isset($_SESSION['error2']))
                    {
                        echo '<div class="warning">'.$_SESSION['error2'].'</div>';
                        unset($_SESSION['error2']);
                    }
                ?>
                <div style="display:none;" class="warning" id="mailError">Neplatný email</div>

                <input class="mt-2 form_text" type="password" id="password" name="password" placeholder="Zadej heslo">
                <div style="display: none;" class="warning" id="passwordLengthError">Heslo je krátké </div>
                
                <input class="mt-2 form_text" type="password" id="password2" name="password2" placeholder="Zadej znovu heslo">
                <div style="display: none;" class="warning" id="passwordMatchError">Hesla se neshodují</div>
                <?php
                    if(isset($_SESSION['error3']))
                    {
                        echo '<div class="warning">'.$_SESSION['error3'].'</div>';
                        unset($_SESSION['error3']);
                    }
                ?>


                <div class="mt-2 ">
                    <div class="align_center">
                        <label >Souhlasím s podmínkami</label>
                        <input class="form_check" type="checkbox" id="checkbox" name="checkbox">
                    </div>
                    <?php
                        if(isset($_SESSION['error4']))
                        {
                            echo '<div class="warning">'.$_SESSION['error4'].'</div>';
                            unset($_SESSION['error4']);
                        }
                    ?>
                </div>


                <div class="text_center">
                    <input class="mt-5 form_submit big_submit shadow" type="submit" id="register" name="submit" value="Registrovat">
                </div>

            </form>
            <div class="form_link">
                    <p>Už máš účet? <a href="login.php">Přihlaš se!</a></p>
            </div>

        </div>
    </div>
</div>

    <?php
        foot();
    ?>
    <script src="script.js"></script>
</body>
</html>