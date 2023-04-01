<?php
function nav()
{
echo'
    <nav>
        <div class = "menu">
            <a class = "menu_item" href="index.php"> Domů </a>
            <a class = "menu_item" href="#"> Alba </a>
            <a class = "menu_item" href="#"> Kategorie </a>

            <a class = "menu_item" href="user.php"> Uživatel(testing) </a>
        </div>

        <div class = "menu right">
            <a class = "menu_item" href="login.php"> Přihlásit </a>
            <a class = "menu_item" href="register.php"> Registrovat </a>
        </div>

        <div class = "menu right search">
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