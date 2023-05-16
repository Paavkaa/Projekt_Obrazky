<?php
    require 'db_setting.php';
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
    <link rel="stylesheet" href="slider.css">
    <title>Document</title>
</head>
<body class="back_red align_center justify_center">
    <?php
        nav();

        $ID_alb = $_GET['id'];
        $sql = "SELECT * FROM album WHERE ID_alb = '$ID_alb'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $public = $row['public'];        
    ?>
    <div class="container">
        <div class="card_form shadow card_line mt-3">
            <h2>Nastavení alba</h2>
            <form action="" method="post">
                <input type="text" class="form_text" name="rename" id="rename" placeholder="Přejmenuj album">
                <div class="mt-2 space_between half_width align_center">
                    <span>Veřejný</span>
                    <label class="switch" for="checkbox">
                    <?php
                        if($public == 1){
                            echo '<input type="checkbox" name="checkbox" id="checkbox" checked />';
                        }else{
                            echo '<input type="checkbox" name="checkbox" id="checkbox" />';
                        }
                    ?>
                    <div class="slider round"></div>
                    </label>
                </div>

                <div class="border_red mt-8 column">
                    <button onclick="show2()" class="red_btn auto_btn border_none p1">Smazat</button>
                    <p class="warning">Pozor, tahle akce smaže celé album. Krok nelze vzít zpět</p>
                </div>

                <?php
                    if(isset($_GET['error']))
                    {
                        echo '<div class="warning mt-1">'.$_GET['error'].'</div>';
                    }
                ?>

                <div class="space_between align_center full_width mt-2">
                    <?php
                        echo '<a href="album.php?id='.$ID_alb.'" class="no_select link">Zpět</a>';
                    ?>
                    <button onclick="show1()" class="form_submit shadow small_submit right">Uložit</button>
                </div>

                <!-- //! DIV NA POTVRZENÍ NASTAVENÍ -->
                <div class="fullscreen" id="submit_win1" style="display:none;">
                    <div class="alert angle20 shadow align_center column">
                        <h4 class="mt-2">Potvrď akci</h4>
                        <input type="password" class="form_text" name="password_sub" placeholder="Zadej aktuální heslo">
                        <div class="space_between align_center full_width mt-2">
                            <button onclick="hide1()" class="">Zpět</button>
                            <input type="submit" name="submit" class="form_submit shadow small_submit right" value="Potvrdit">
                        </div>
                    </div>
                </div>

                <div class="fullscreen" id="submit_win2" style="display:none;">
                    <div class="alert angle20 shadow align_center column">
                        <h4 class="mt-2">Potvrď akci</h4>
                        <input type="password" class="form_text" name="password_del" placeholder="Zadej aktuální heslo">
                        <div class="space_between align_center full_width mt-2">
                            <button onclick="hide2()" class="">Zpět</button>
                            <input type="submit" name="delete" class="form_submit shadow small_submit right" value="Potvrdit">
                        </div>
                    </div>
                </div>
                
            </form>

        </div>
    </div>

    <script>
        function show1(){
            event.preventDefault();
            document.getElementById('submit_win1').style.display = "block";
        }
        function hide1(){
            document.getElementById('submit_win1').style.display = "none";
        }

        function show2(){
            event.preventDefault();
            document.getElementById('submit_win2').style.display = "block";
        }
        function hide2(){
            document.getElementById('submit_win2').style.display = "none";
        }
    </script>
</body>
</html>