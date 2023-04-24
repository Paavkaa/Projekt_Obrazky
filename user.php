<?php
    require 'funkce.php';
    require 'db_login.php';

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
<body>
    <header class="circle1 align_center">
        <div class="circle2 ml_5">
            <?php
                    echo '<h2 class="text_center">Přihlášen jako ' . $_SESSION['nickname'] . '</h2>';
            ?>
        </div>
    </header>
    <?php
        nav();
    ?>

    <div class="card">
        <div class="card_item">
            <div>
                <?php
                    album();
                ?>
            </div>
        </div>
    </div>

    <?php
       /*  foot(); */
    ?>
</body>
</html>