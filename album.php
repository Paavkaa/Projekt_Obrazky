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
        $ID_alb = $_GET['id'];
        
        $sql = "SELECT * FROM album WHERE ID_alb = $ID_alb";
        $result1 = mysqli_query($GLOBALS['conn'], $sql);
        
        $sql = "SELECT * FROM picture WHERE ID_alb = $ID_alb";
        $result2 = mysqli_query($GLOBALS['conn'], $sql);

        $nazev_alb = mysqli_fetch_assoc($result1);
        $nazev_alb = $nazev_alb['nazev_alb'];

        $img_path = "./users/" . $_SESSION['nickname'] . "/";

    ?>
    <header class="circle1 align_center">
        <div class="circle2 ml_5">
            <?php
                    echo '<h2 class="text_center">' . $nazev_alb . '</h2>';
            ?>
        </div>
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
        <div class="card_item">
            <h3 class="size_40">Obrázky</h3>
            <?php
                //výpis obrázků
                while($row = mysqli_fetch_assoc($result2)) {
                    if($row['ID_alb'] == $ID_alb)
                    echo '<img class="album" src="'. $img_path . $row['nazev_pic'] .'" alt="">';
                }

                //přidání nového obrázku
                echo '
                <a href="new_pic.php?id=' . $ID_alb . '" class="no_decoration album back_white align_center justify_center column">
                <p class="add align_center" >+</p>
                <h3 class="text_center">Nové foto</h3>
                </a> ';
            ?>
        
        </div>
    </div>

    <?php
        foot();
    ?>
    <script src="script.js"></script>
</body>
</html>