<?php
    require 'funkce.php';
    require 'db_setting2.php';
    require 'connect.php';

    $ID_user = $_SESSION['ID_user'];
    $sql = "SELECT * FROM user WHERE ID_user = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: setting_user.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $ID_user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        //uživatel
        $name = $row['nickname'];
        $mail = $row['mail'];
    }
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

    <div class="container">
        <div class="card_form shadow card_line mt-3">
            <h2 class="mb-2">Nastavení</h2>
            <form class="mb-1" action="" method="post">
                <h3 class="mb-1">Osobní údaje</h3>
                <?php
                echo'
                    <input type="text" class="form_text" name="rename" id="rename" placeholder="'.$name.'">
                    <input type="text" class="form_text mt-1" name="mail" id="mail" placeholder="'.$mail.'">'; 
                ?>
                
                <h3 class="mb-1">Změna hesla</h3>
                <input type="password" class="form_text mt-2" name="password_new1" id="password_new1" placeholder="Nové heslo">
                <input type="password" class="form_text mt-1" name="password_new2" id="password_new2" placeholder="Znovu nové heslo">

                <?php
                    if(isset($_GET['error']))
                    {
                        echo '<div class="warning mt-2">Chyba při vytvoření: '.$_GET['error'].'</div>';
                    }
                ?>

                <div class="space_between align_center full_width mt-2">
                    <a href="user.php" class="no_select link">Na profil</a>
                    <button class="form_submit shadow small_submit right" onclick="show()">Uložit</button>
                </div>

                <div class="fullscreen" id="submit_win1" style="display:none;">
                    <div class="alert angle20 shadow align_center column">
                        <h4 class="mt-2">Potvrď akci</h4>                
                        <input type="password" class="form_text" name="password" id="password" placeholder="Aktuální heslo">
                        <div class="space_between align_center full_width mt-2">
                            <button onclick="hide()" class="">Zpět</button>
                            <input type="submit" name="submit" class="form_submit shadow small_submit right" value="Potvrdit">
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    <script>
        function show(){
            event.preventDefault();
            document.getElementById('submit_win1').style.display = "block";
        }
        function hide(){
            document.getElementById('submit_win1').style.display = "none";
        }
    </script>
</body>
</html>