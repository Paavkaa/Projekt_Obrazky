<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>

<?php

    require 'db_register.php';
    require 'funkce.php';
?>

<body class="back-red">
    <div class="card mt-8">
        <div class="card_item shadow card_line">
            <h2 class="text_center">Registrace</h2>
            <form action="" method="post">
                <input class="form_text" type="text" id="username" name="username" placeholder="Přezdívka" autofocus>
                <br>
                <?php
                        if (isset($_GET['error1'])) 
                        {
                            echo '<div class="warning">' . $_GET['error1'] . '</div>';
                        }
                ?>
                <div style="display:none" class="warning" id="usernameError">Zadej přezdívku</div>
                <br style="display: none;" id="hideBr1">
                
                <input class="mt-2 form_text" type="text" id="email" name="email" placeholder="E-mail">
                <br>
                <?php
                    if (isset($_GET['error2'])) 
                    {
                        echo '<div class="warning">' . $_GET['error2'] . '</div>';
                    }
                ?>
                <div style="display:none;" class="warning" id="mailError">Neplatný email</div>
                <br style="display: none;" id="hideBr2">

                <input class="mt-2 form_text" type="password" id="password" name="password" placeholder="Zadej heslo">
                <br>
                <div style="display: none;" class="warning" id="passwordLengthError">Heslo je krátké </div>
                <br style="display:none" id="hideBr3"> 
                
                <input class="mt-2 form_text" type="password" id="password2" name="password2" placeholder="Zadej znovu heslo">
                <br>
                <div style="display: none;" class="warning" id="passwordMatchError">Hesla se neshodují</div>
                <br style="display: none;" id="hideBr4">
                <?php
                    if (isset($_GET['error3'])) 
                    {
                        echo '<div class="warning">' . $_GET['error3'] . '</div>';
                    }
                ?>


                <div class="mt-2 ">
                    <div class="align_center">
                        <label >Souhlasím s podmínkami</label>
                        <input class="form_check" type="checkbox" id="checkbox" name="checkbox">
                    </div>
                </div>
                <?php
                    if (isset($_GET['error5'])) 
                    {
                        echo '<div class="warning">' . $_GET['error5'] . '</div>';
                    }
                ?>

                <div class="text_center">
                    <input class="mt-5 form_submit" type="submit" id="register" name="submit" value="Registrovat">
                </div>

            </form>
            <div class="form_link">
                    <p>Už máš účet? <a href="login.php">Přihlaš se!</a></p>
            </div>

        </div>
    </div>

    
    <script src="script.js"></script>
    <?php
        nav();
        foot();
    ?>


</body>
</html>