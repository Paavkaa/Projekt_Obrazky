<?php
    require 'funkce.php';

    $servername = "md200.wedos.net";
    $username = "a93646_pavelk";
    $password = "puquMcUe";
    $dbname = "d93646_pavelk";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
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
    <?php
        $ID_alb = $_GET['id'];
        
        $sql = "SELECT * FROM album WHERE ID_alb = $ID_alb";
        $result1 = mysqli_query($conn, $sql);
        
        $sql = "SELECT * FROM picture WHERE ID_alb = $ID_alb";
        $result2 = mysqli_query($conn, $sql);

        $nazev_alb = mysqli_fetch_assoc($result1);
        $nazev_alb = $nazev_alb['nazev_alb'];

        $img_path = "./users/" . $_SESSION['nickname'] . "/";

    ?>
    <header class="slanted align_center justify_center">
        <?php
                echo '<h2 class="text_center">' . $nazev_alb . '</h2>';
        ?>
    </header>

    <?php
        nav();
    ?>

    <!-- Přidání nového obrázku a nastavení alba -->
    <div class="justify_center mt-5">
        <div class="space_between">
        <?php
            echo '<a href="new_pic.php?id='. $ID_alb .'" class="no_decoration  back_white align_center justify_center back_gray size_20 auto_btn">
                <p class="text_center">Nové foto</p>
            </a>';
        
            echo '<a href="setting_alb.php?id='. $ID_alb .'" class="no_decoration back_white align_center justify_center back_gray auto_btn size_20 ml_3">Nastavení</a>';
        ?>
        </div>
    </div>

    <!-- zpět -->
    <a href="user.php" class="shadow no_select no_decoration round_btn fixed_btn white_btn align_center justify_center">Zpět</a>

    <!-- obrázky -->
    <div class="card">
        <div class="card_album width1500">
            <h3 class="size_40 ml_3">Obrázky</h3>
            <div class="wrap justify_center">
            <?php
                //výpis obrázků
                while($row = mysqli_fetch_assoc($result2)) {
                    if($row['ID_alb'] == $ID_alb)
                    echo '
                    <div class="item_6">
                        <img class="angle20 pic" src="'. $img_path . $row['nazev_pic'] .'" alt="obrazek">
                    </div>
                    ';
                }

                //přidání nového obrázku
                echo '
                <a href="new_pic.php?id=' . $ID_alb . '" class="no_decoration inline-flex item_6 pic">
                 <div class="justify_center align_center column">
                <img src="img/plus.svg" class="add" alt="add" id="svgImg">
                <h3 class="text_center">Nové foto</h3>
                </div>
                </a>';

                
            ?>
            </div>        
        </div>
    </div>

    <!-- fullscreen img -->

    <div class="fullscreen" style="display: none;">
        <img id="fullscreen" src="" alt="obrazek">
    </div>

    <script>
    document.querySelectorAll('.pic').forEach(item => {
    item.addEventListener('click', event => {
            const fullscreen = document.querySelector('.fullscreen');
            fullscreen.style.display = 'block';
            fullscreen.querySelector('img').src = item.src;
            document.querySelector('body').style.overflow = 'hidden';
            window.scrollTo(0, 0);
        });
    });

    document.querySelector('.fullscreen').addEventListener('click', event => {
        if (event.target === event.currentTarget) {
            event.currentTarget.style.display = 'none';
            document.querySelector('body').style.overflow = 'auto';
        }
    });

        
    </script>
</body>
</html>