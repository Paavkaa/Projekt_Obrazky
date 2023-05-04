<?php
require 'db_pic.php';
$ID_alb = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="dropdownPREDELAT.css">
    <title>Document</title>
</head>

<body class="back_red align_center justify_center">


<div class="card">
    <div class="card_form shadow card_line">
        <h2>Přidej obrázky</h2>
        <form action="" class="column align_center justify_center" method="post" enctype="multipart/form-data">
            <div class=" column">

                <div class="mt-2 ">
                    <label for="file" class="form_file text_center align_center justify_center"> Vlož obrázky</label>
                    <input type="file" name="file[]" id="file" multiple>
                    
                </div>

                <?php
                    if (isset($_GET['error1'])) {
                        echo '<div class="warning">'.$_GET['error1'].'</div>';
                    }
                    if (isset($_GET['error2'])) {
                        echo '<div class="warning">'.$_GET['error2'].'</div>';
                    }
                ?>

                <p class="gray mt-1">Vložené obrázky:</p>
                <div class="mt-1">
                    <div id="preview" class="preview"></div>
                </div>
                
            </div>

            <div class="space_between align_center full_width mt-2">
                <a href="user.php" class="no_select link">Zpět</a>
                <input type="submit" name="submit" class="form_submit shadow small_submit right" value="Vytvořit">
            </div>
        </form>

    </div>
</div>
    
<script>
    function previewImages() {
    var preview = document.querySelector('#preview');
    if (this.files) {
      [].forEach.call(this.files, readAndPreview);
    }
  
    function readAndPreview(file) {
      // Make sure `file.name` matches our extensions criteria
      if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
        return alert(file.name + " není podporovaný formát obrázku");
      } // else...
  
      var reader = new FileReader();
  
      reader.addEventListener("load", function() {
        var image = new Image();
        image.height = 100;
        image.title  = file.name;
        image.src    = this.result;
        preview.appendChild(image);
      });
  
      reader.readAsDataURL(file);
    }
  }
  
document.querySelector('#file').addEventListener("change", previewImages);
</script>

</body>
</html>