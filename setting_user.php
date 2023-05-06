<?php
    require 'funkce.php';
    require 'db_setting2.php';

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
    ?>

    <div class="card  ">
        <div class="card_form shadow card_line mt-3">
            <h2 class="mb-2">Nastavení</h2>
            <form class="mb-1" action="" method="post">
                <h3 class="mb-1">Osobní údaje</h3>
                <input type="text" class="form_text" name="rename" id="rename" placeholder="Přezdívka">
                <input type="text" class="form_text mt-1" name="mail" id="mail" placeholder="E-mail">
                
                <h3 class="mb-1">Změna hesla</h3>
                <input type="password" class="form_text" name="password_old" id="password_old" placeholder="Aktuální heslo">

                <input type="password" class="form_text mt-2" name="password_new1" id="password_new" placeholder="Nové heslo">
                <input type="password" class="form_text mt-1" name="password_new2" id="password_new" placeholder="Znovu nové heslo">

                <?php
                    if(isset($_GET['error']))
                    {
                        echo '<div class="warning mt-2">Chyba při vytvoření: '.$_GET['error'].'</div>';
                    }
                ?>

                <div class="space_between align_center full_width mt-2">
                    <a href="user.php" class="no_select link">Na profil</a>
                    <input type="submit" name="submit" class="form_submit shadow small_submit right" value="Uložit">
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>