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
    <?php
        require 'funkce.php';
        nav();
    ?>
    <header class="circle1 align_center">
        <div class="circle2 ml_5">
            <?php
                    echo '<h2 class="text_center">Přihlášen jako ' . $_SESSION['nickname'] . '</h2>';
            ?>
        </div>
    </header>

    <div class="card">
        <div class="card_item shadow">
            <h3>Alba</h3>
            <div class="row">
                <div class="shadow card_item album justify_center align_center column">
                    <img src="img/chemie.png" class="album_image mt-2" alt="obrazek">
                    <h4 class="text_center">Chemie</h4>
                </div>

                <a href="new_alb.php" class="no_decoration">
                    <div class="shadow card_item album justify_center align_center column">
                    <p class="add align_center" >+</p>
                    <h3 class="text_center">Nové album</h3>
                    </div>
                </a>

                <a href="new_pic.php" class="no_decoration">
                    <div class="shadow card_item album justify_center align_center column">
                    <p class="add align_center" >+</p>
                    <h3 class="text_center">Nové foto</h3>
                    </div>
                </a>
            </div>
            <h3>Nezařazené</h3>
            <div class="row">
                <div class="shadow card_item album justify_center align_center column">
                    <img src="img/chemie.png" class="album_image mt-2" alt="obrazek">
                    <h4 class="text_center">Chemie</h4>
                </div>
            </div>
            
            <?php
                
            ?>
        </div>
    </div>

    <?php
        foot();
    ?>
</body>
</html>