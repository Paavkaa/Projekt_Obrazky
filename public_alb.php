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
<header class="circle align_center justify_center column">
    <h1 class=" mb-2">Alba</h1>
</header>

<div class="card">
        <div class="card_album">
            <div class="column align_center justify_center">
            <h3 class="size_40">Nejnovější veřejná</h3>
                <?php
                    public_alb();
                ?>
            </div>
        </div>
    </div>

<?php
nav();
?>
</body>
</html>