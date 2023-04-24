<?php
if(!isset($_SESSION)) 
{
    session_start();
}

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

/*  echo '<div class = "right"> <div class = "menu search">
    <input class = " menu_text" type = "text" name = "search" placeholder = "Hledat">
    <input class = " menu_submit" type = "submit" name = "submit" value = "Ok">
    </div> </div>'; */
    if(isset($_SESSION["ID_user"])) {
    echo '<div class="menu drop_menu right">
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

function album()
{
    $servername = "md200.wedos.net";
    $username = "a93646_pavelk";
    $password = "puquMcUe";
    $dbname = "d93646_pavelk";

    $conn = mysqli_connect($servername, $username, $password, $dbname); 

    $sql = "SELECT * FROM album";
    $result = mysqli_query($conn ,$sql);
    $user = $_SESSION["ID_user"];

    echo'
    <h3 class="size_40">Alba</h3>
    <div class="wrap">
        ';
        while($row = mysqli_fetch_assoc($result)) {
            if($row['ID_u'] == $user)
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
         <a href="new_alb.php" class="no_decoration inline-flex item_4">
            <div class="justify_center align_center column">
            <img src="img/plus.svg" class="item_4 add" alt="add" id="svgImg">
            <h3 class="text_center">Nové album</h3>
            </div>
        </a>

    </div>
';
    
}

function login()
{
    echo'
    <div class="card">
    <div class = "card_item shadow card_line mt-3" >
        <h2 class="text_center">Přihlásit</h2>
        <form action="login.php" class="column" method="post">
            <input class="form_text" type="text" name="username" id="username" placeholder="Přezdívka" autofocus>
            <div style="display:none" class="warning" id="usernameError">Zadej přezdívku</div>';
            
            if (isset($_GET['error1'])) 
            {
               echo '<div class="warning">' . $_GET['error1'] . '</div>';
            }

            echo'<input class="mt-2 form_text" type="password" id="password" name="password" placeholder="Heslo">';
            
            if (isset($_GET['error2'])) 
            {
                echo '<div class="warning">' . $_GET['error2'] . '</div>';
            }
            

            echo'<div class="text_center">
                <input class="mt-5 form_submit big_submit shadow" type="submit" id="signin" name="submit" value="Přihlásit">
            </div>
        </form>            
        <div class="form_link">
                <p>Ještě nemáš účet? <a href="register.php">Vytvoř si ho!</a></p>
        </div>
    </div>
</div>';
}

function register()
{
   echo '<div class="card">
        <div class="card_item shadow card_line">
            <h2 class="text_center">Registrace</h2>
            <form action="" class="column" method="post">
                <input class="form_text" type="text" id="username" name="username" placeholder="Přezdívka" autofocus>';
                    if (isset($_GET['error1'])) 
                    {
                        echo '<div class="warning">' . $_GET['error1'] . '</div>';
                    }
                echo '<div style="display:none" class="warning" id="usernameError">Zadej přezdívku</div>
                
                <input class="mt-2 form_text" type="text" id="email" name="email" placeholder="E-mail">';
                if (isset($_GET['error2'])) 
                {
                    echo '<div class="warning">' . $_GET['error2'] . '</div>';
                }
                echo '<div style="display:none;" class="warning" id="mailError">Neplatný email</div>

                <input class="mt-2 form_text" type="password" id="password" name="password" placeholder="Zadej heslo">
                <div style="display: none;" class="warning" id="passwordLengthError">Heslo je krátké </div>
                
                <input class="mt-2 form_text" type="password" id="password2" name="password2" placeholder="Zadej znovu heslo">
                <div style="display: none;" class="warning" id="passwordMatchError">Hesla se neshodují</div>';
                if (isset($_GET['error3'])) 
                {
                    echo '<div class="warning">' . $_GET['error3'] . '</div>';
                }


                echo '<div class="mt-2 ">
                    <div class="align_center">
                        <label >Souhlasím s podmínkami</label>
                        <input class="form_check" type="checkbox" id="checkbox" name="checkbox">
                    </div>
                </div>';
                if (isset($_GET['error5'])) 
                {
                    echo '<div class="warning">' . $_GET['error5'] . '</div>';
                }

               echo '<div class="text_center">
                    <input class="mt-5 form_submit big_submit shadow" type="submit" id="register" name="submit" value="Registrovat">
                </div>

            </form>
            <div class="form_link">
                    <p>Už máš účet? <a href="login.php">Přihlaš se!</a></p>
            </div>

        </div>
    </div>';
}


?>