<?php
session_start();

/* $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "obrazky";
$conn = mysqli_connect($servername, $username, $password, $dbname);
 */
function nav()
{
echo'
<div class="absolute_top">
    <nav>
        <div class="menu">
            <a class="menu_item" href="index.php">Domů</a>
            <a class="menu_item" href="#">Alba</a>
            <a class="menu_item" href="#">Kategorie</a>
        </div>';

 echo '<div class = "right"> <div class = "menu search">
    <input class = " menu_text" type = "text" name = "search" placeholder = "Hledat">
    <input class = " menu_submit" type = "submit" name = "submit" value = "Ok">
    </div> </div>';
    if(isset($_SESSION["nickname"])) {
    echo '<div class="menu drop_menu">
        <a class="menu_item" href="user.php">' . $_SESSION["nickname"] . '</a>
        <div class="drop_content">
            <a class="drop_item justify_center" href="user.php">Profil</a>
            <a class="drop_item justify_center" href="user.php">Nastavení</a>
            <a class="drop_item justify_center" href="logout.php">Odhlásit</a>
        </div>
    </div>';
    } 
    else 
    {
    echo '<div class="menu right">
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

?>