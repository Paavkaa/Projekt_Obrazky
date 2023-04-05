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
            <?php
                
            ?>
            <div class="mt-5">
                <h3>Nezařazené</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores eaque labore nobis quo. Quae amet numquam saepe possimus rem expedita dolorem dolore velit debitis ipsam ducimus reprehenderit esse atque doloremque deserunt natus a ipsa nam, architecto pariatur suscipit ullam provident veniam? Pariatur debitis illo sed velit incidunt aut vel veritatis!</p>
            </div>
        </div>
    </div>

    <?php
        nav();
        foot();
    ?>
</body>
</html>