<?php
session_start();
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
<body class="back_red align_center justify_center">
<div class="card">
    <div class="card_item shadow card_line">
        <h2>Vytvoř nové album</h2>
        <div class="justify_center">
            <form action="new_alb.php" class="column align_center full_width" method="post">
                <div>
                    <input type="text" name="name" id="name" class="form_text" placeholder="Název alba">

                    <div class="mt-2 ">
                        <label for="file" class="form_file text_center align_center justify_center"> Vlož obrázky</label>
                        <input type="file" name="files[]" id="file" multiple>
                    </div>

                    <div class="mt-2 column">
                        <div class="space_between quarter_width p1">
                            <label for="radio">Soukromý</label>
                            <input type="radio" name="radio" id="radio1" value="private">
                        </div>
                        <div class="space_between quarter_width p1">
                            <label for="radio">Veřejný</label>
                            <input type="radio" name="radio" id="radio2" value="public">
                        </div>
                    </div>
                </div>
                
                <div class="space_between align_center full_width mt-2">
                    <a href="user.php" class="no_select link">Zpět</a>
                    <input type="submit" class="form_submit shadow small_submit right" value="Vytvořit">
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>