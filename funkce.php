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
    <nav>
        <div class = "menu">
            <a class = "menu_item" href="index.php"> Domů </a>
            <a class = "menu_item" href="#"> Alba </a>
            <a class = "menu_item" href="#"> Kategorie </a>

        </div>';

        if(isset($_SESSION["nickname"]))
        {
            echo'<div class = "menu right drop_menu">
                <a class = "menu_item" href="user.php"> ' . $_SESSION["nickname"] . ' </a>
                <div class = "drop_content">
                    <a class = "drop_item" href="user.php"> Profil </a>
                    <a class = "drop_item" href="user.php"> Nastavení </a>
                    <a class = "drop_item" href="logout.php"> Odhlásit se </a>
                </div>
            </div>';
        }
        else
        {
            echo'<div class = "menu right">
                <a class = "menu_item" href="login.php"> Přihlásit se </a>
                <a class = "menu_item" href="register.php"> Registrovat se </a>
            </div>';
        }

        echo'<div class = "menu right search">
            <input class = " menu_text" type = "text" name = "search" placeholder = "Hledat">
            <input class = " menu_submit" type = "submit" name = "submit" value = "Ok">
        </div>

    </nav>';
}

function foot()
{
    echo'
    <footer>
            <p> &copy; 2023 - Všechna práva vyhrazena </p>
    </footer>';
}

?>