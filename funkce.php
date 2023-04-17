<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "obrazky";
$conn = mysqli_connect($servername, $username, $password, $dbname);

function nav()
{
echo'
<div class="absolute_top no_select">
    <nav class="back_black">
        <div class="menu">
            <a class="menu_item" href="index.php">Domů</a>
            <a class="menu_item" href="#">Alba</a>
            <a class="menu_item" href="#">Kategorie</a>
        </div>';

 echo '<div class = "right"> <div class = "menu search">
    <input class = " menu_text" type = "text" name = "search" placeholder = "Hledat">
    <input class = " menu_submit" type = "submit" name = "submit" value = "Ok">
    </div> </div>';
    if(isset($_SESSION["ID_user"])) {
    echo '<div class="menu drop_menu">
        <a class="menu_item" href="user.php">' . $_SESSION["nickname"] . '</a>
        <div class="drop_content back_black">
            <a class="drop_item justify_center" href="user.php">Profil</a>
            <a class="drop_item justify_center" href="user.php">Nastavení</a>
            <a class="drop_item justify_center" href="logout.php" id="logout-btn">Odhlásit</a>
        </div>
    </div>';
    } 
    else 
    {
    echo '<div class="menu">
        <a class="menu_item" href="login.php">Přihlásit</a>
        <a class="menu_item" href="register.php">Registrovat</a>
    </div>';
    }
   
    echo '</nav> </div>';

}

function foot()
{
    echo'
    <footer>
            <p> &copy; 2023 - Všechna práva vyhrazena </p>
    </footer>';
}

function album()
{
    $sql = "SELECT * FROM album";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $user = $_SESSION["ID_user"];

    echo'
    <h3 class="size_40">Alba</h3>
    <div class="wrap">
        ';
        while($row = mysqli_fetch_assoc($result)) {
            if($row['ID_user'] == $user)
            {
                echo'
                <a href="album.php?id=' . $row['ID_alb'] . '" class="no_decoration item_4 inline-flex align_center"> 
                <div class="shadow justify_center align_center column angle20">
                <img src="img/chemie.png" class="album_image mt-2" alt="obrazek" id="pngImg">
                <h4 class="text_center">'. $row['nazev_alb'] .'</h4>
                </div>
                </a>
            ';
            }
        }
        echo'
        <a href="new_alb.php" class="no_decoration item_4 inline-flex align_center">
            <div class="shadow justify_center align_center column angle20">
            <img src="img/plus.svg" class="add" alt="obrazek" id="svgImg">
            <h3 class="text_center">Nové album</h3>
            </div>
        </a>

    </div>
';
    
    
    

    
}

?>