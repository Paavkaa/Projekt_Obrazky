<?php
    session_start();
    require 'funkce.php';
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
<body class="back_gray">
    <header class="circle align_center justify_center">
        <h1>Projekt OBRÁZKY</h1>
    </header>
    <?php
        nav();
    ?>
    
    <div class="container full_vh align_start">
        <div class="card back_white width_80 ">

            <div class="align_center space_between wrap">
                <div class="align_center column item_2">
                    <img src="" alt="">
                    <h4 class="mb-0 text_center">V jednoduchosti je síla</h4>
                    <p class=" text_center mt-1">V jednoduchosti spočívá naše síla. Věříme, že sdílení obrázků by mělo být snadné a přístupné pro všechny. Proto se snažíme navrhovat náš web s ohledem na pohodlí uživatele. Chceme, aby každý, kdo navštíví náš web, měl pocit, že mu náš web nabízí přívětivé a příjemné prostředí pro sdílení svých fotografií.</p>
                </div>
                <div class="align_center column item_2">
                    <img src="" alt="">
                    <h4 class="mb-0 text_center">Lorem, ipsum dolor.</h4>
                    <p class=" text_center mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur dignissimos inventore quod vero? Est debitis suscipit odio, illo cum hic!</p>
                </div>
            </div>

            <div class="align_center space_between wrap">
                <div class="align_center column item_3">
                    <img src="" alt="">
                    <h4 class="mb-0">Lorem, ipsum dolor.</h4>
                    <p class=" text_center mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur dignissimos inventore quod vero? Est debitis suscipit odio, illo cum hic!</p>
                </div>
                <div class="align_center column item_3">
                    <img src="" alt="">
                    <h4 class="mb-0 text_center">Lorem, ipsum dolor.</h4>
                    <p class=" text_center mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur dignissimos inventore quod vero? Est debitis suscipit odio, illo cum hic!</p>
                </div>
                <div class="align_center column item_3">
                    <img src="" alt="">
                    <h4 class="mb-0 text_center">Lorem, ipsum dolor.</h4>
                    <p class=" text_center mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur dignissimos inventore quod vero? Est debitis suscipit odio, illo cum hic!</p>
                </div>
            </div>
        </div>
    </div>


    </div>

    <?php
        foot();
    ?>
</body>
</html>