<?php
require 'db_album.php';
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


<div class="card">
    <div class="card_item shadow card_line">
        <h2>Vytvoř nové album</h2>
        <form action="db_album.php" class="column align_center justify_center" method="post" enctype="multipart/form-data">
            <div class=" column">
                <input type="text" name="name" id="name" class="form_text" placeholder="Název alba">

                <?php
                    if(isset($_GET['error']))
                    {
                        echo '<div class = "warning">'.$_GET['error'].'</div>';
                    }
                ?>
                
                <div class="mt-2 space_between half_width align_center">
                    <span>Veřejný</span>
                    <label class="switch" for="checkbox">
                    <input type="checkbox" id="checkbox" name="checkbox"/>
                    <div class="slider round"></div>
                    </label>
                </div>

            </div>

            <div class="space_between align_center full_width mt-2">
                <a href="user.php" class="no_select link">Zpět</a>
                <input type="submit" name="submit" class="form_submit shadow small_submit right" value="Vytvořit">
            </div>
        </form>
    </div>
</div>
    
<script src="script.js"></script>
</body>
</html>