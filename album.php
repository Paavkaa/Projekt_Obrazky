<?php
    require 'funkce.php';
    require 'connect.php';
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

        $sql3 = "SELECT * FROM user u JOIN album a ON u.ID_user = a.ID_u WHERE a.ID_alb = $ID_alb";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $user = $row3['nickname'];

        $nazev_alb = mysqli_fetch_assoc($result1);
        $nazev_alb = $nazev_alb['nazev_alb'];

        $img_path = "./users/" . htmlspecialchars($user) . "/";

    ?>
    <header class="slanted align_center justify_center">
        <?php
                echo '<h2 class="text_center">' . htmlspecialchars($nazev_alb) . '</h2>';
        ?>
    </header>

    <?php
        nav();
    ?>

    <!-- Přidání nového obrázku a nastavení alba -->
    <div class="justify_center mt-5">
        <div class="space_between">
        <?php
            if (isset($_SESSION['nickname']) && $user == $_SESSION['nickname']) 
            {
                echo '<a href="new_pic.php?id='. $ID_alb .'" class="no_decoration  back_white align_center justify_center back_gray size_20 auto_btn">
                <p class="text_center">Nové foto</p>
                </a>';
        
                echo '<a href="setting_alb.php?id='. $ID_alb .'" class="no_decoration back_white align_center justify_center back_gray auto_btn size_20 ml_3">Nastavení</a>';

            }
       ?>
        </div>
    </div>

    <!-- zpět -->
    <?php
    if(isset($_SESSION['nickname']) && $user == $_SESSION['nickname'])
    {
        echo'<a href="user.php" class="shadow no_select no_decoration round_btn fixed_btn white_btn align_center justify_center">Zpět</a>';
    }
    else
    {
        echo'<a href="public_alb.php" class="shadow no_select no_decoration round_btn fixed_btn white_btn align_center justify_center">Zpět</a>';
    }
    ?>
    

    <!-- obrázky -->
    <div class="container">
        <div class="card_album width1500 justify_center column">
            <h3 class="size_40 ml_3">Obrázky</h3>
            <div class="wrap">
            <?php
                //výpis obrázků
                while($row = mysqli_fetch_assoc($result2)) {
                    if($row['ID_alb'] == $ID_alb)
                    echo '
                    <div class="item_6">
                        <img class="angle20 pic" src="'. $img_path . htmlspecialchars($row['nazev_pic']) .'" alt="obrazek">
                    </div>
                    ';
                }

                //přidání nového obrázku
                if(isset($_SESSION['nickname']) && $user == $_SESSION['nickname'])
                {
                    echo '
                        <a href="new_pic.php?id=' . $ID_alb . '" class="no_decoration inline-flex item_6 pic">
                         <div class="justify_center align_center column">
                        <img src="img/plus.svg" class="add" alt="add" id="svgImg">
                        <h3 class="text_center">Nové foto</h3>
                        </div>
                        </a>';
                }
                
            ?>
            </div>        
        </div>
    </div>

    <!-- fullscreen img -->

    <div class="fullscreen" style="display: none;">
        <img id="fullscreen" src="" alt="obrazek">
    </div>
    
    <?php
        foot();
    ?>

    <script>
    document.querySelectorAll('.pic').forEach(item => {
    item.addEventListener('click', event => {
            const fullscreen = document.querySelector('.fullscreen');
            fullscreen.style.display = 'block';
            fullscreen.querySelector('img').src = item.src;
            document.querySelector('body').style.overflow = 'hidden';
        });
    });

    document.querySelector('.fullscreen').addEventListener('click', event => {
        if (event.target === event.currentTarget) {
            event.currentTarget.style.display = 'none';
            document.querySelector('body').style.overflow = 'auto';
        }
    });

    function adjustButtonPosition() 
    {
        const button = document.querySelector('.fixed_btn');
        if (button) {
          const windowHeight = window.innerHeight;
          const scrollTop = window.scrollY || window.pageYOffset;
          const pageHeight = document.body.scrollHeight;
          if (scrollTop + windowHeight >= pageHeight) {
            button.style.bottom = '55px';
          } else {
            button.style.bottom = '25px';
          }
        }
    }

    window.addEventListener('scroll', adjustButtonPosition);
    window.addEventListener('resize', adjustButtonPosition);
            
    </script>
</body>
</html>