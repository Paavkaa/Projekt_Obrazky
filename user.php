<?php
    require 'funkce.php';
    require 'db_login.php';

    no_session();
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
    <header class="slanted align_center">
        <div class="ml_5">
            <?php
                    echo '<h2 class="justify_center">Přihlášen jako ' . $_SESSION['nickname'] . '</h2>';
            ?>
        </div>
    </header>
    <?php
        nav();
    ?>

    <div class="container">
        <div class="card_album">
            <h3 class="size_40">Alba</h3>
            <?php
                album();
            ?>
        </div>
    </div>

    <?php
        foot();
    ?>
</body>
</html>