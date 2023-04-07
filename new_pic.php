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

<?php
require 'db_pic.php';
?>

<div class="card">
    <div class="card_item shadow card_line">
        <h2>Přidej obrázky</h2>
        <form action="" class="column align_center justify_center" method="post" enctype="multipart/form-data">
            <div class=" column">

                <div class="mt-2 ">
                    <label for="file" class="form_file text_center align_center justify_center"> Vlož obrázky</label>
                    <input type="file" name="file" id="file" multiple>
                    
                </div>

                <p class="gray mt-1">Vložené obrázky:</p>
                <div class="mt-1">
                    <div id="preview" class="preview"></div>
                </div>
                
            </div>

            <div class="space_between align_center full_width mt-2">
                <a href="user.php" class="no_select link">Zpět</a>
                <input type="submit" class="form_submit shadow small_submit right" value="Vytvořit">
            </div>
        </form>
    </div>
</div>
    
<script src="script.js"></script>
</body>
</html>