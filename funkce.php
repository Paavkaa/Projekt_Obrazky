<?php
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

function user()
{
    if(isset($_POST['submit']))
    {
        $nickname = $_POST['username'];
        $sql = "SELECT * FROM user WHERE nickname = '$nickname'";
        $result = $GLOBALS['conn']->query($sql);
        if ($result->num_rows > 0) {
            echo '<span style="display:none;" class="warning" id="nickUsed">Přezdívka je už použita, zvol jinou</span>';
        }
    }
}

?>