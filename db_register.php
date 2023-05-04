<?php

$servername = "md200.wedos.net";
$username = "a93646_pavelk";
$password = "puquMcUe";
$dbname = "d93646_pavelk";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kontrola připojení
if (!$conn) {
die("Připojení se nezdařilo: " . mysqli_connect_error());
}

//! REGISTRACE UŽIVATELE
if(isset($_POST['submit']))
{
    $nickname = $_POST['username'];
    $sql = "SELECT * FROM user WHERE nickname = '$nickname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        $error_msg1 = "Přezdívka je již použitá!";
        $_SESSION['error1'] = $error_msg1;
        header("location: register.php");
        exit();
    }
    if (strlen($nickname) == 0) 
    {
        $error_msg2 = "Přezdívka je prázdná!";
        $error_msg2 = "Přezdívka je prázdná!";
        $_SESSION['error1'] = $error_msg2;
        header("location: register.php");
        exit();
    }

    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE mail = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        $error_msg3 = "E-mail je již použitý!";
    $_SESSION['error2'] = $error_msg3;
    header("location: register.php");
    exit();



    } 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $error_msg4 = "Neplatný formát e-mailu!";
        $_SESSION['error2'] = $error_msg4;
        header("location: register.php");
        exit();        
    }
    
    else 
    {
        $password = $_POST['password'];
        $password_check = $_POST['password2'];

         // Kontrola, zda se hesla shodují
        if ($password != $password_check) 
        {
            $error_msg5 = "Hesla se neshodují!";
            $_SESSION['error3'] = $error_msg5;
            header("location: register.php");
            exit();            

        }
    
        // Kontrola, zda heslo splňuje minimální délku
        if (strlen($password) < 8) 
        {
            $error_msg6 = "Heslo musí mít minimálně 8 znaků!";
            $_SESSION['error3'] = $error_msg6;
            header("location: register.php");
            exit();            

        }
        //kontrola vyplnění checkboxu
        if (!isset($_POST['checkbox'])) 
        {
            $error_msg7 = "Musíte souhlasit s podmínkami!";
            $_SESSION['error4'] = $error_msg7;
            header("location: register.php");
            exit();            

        }
        else
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Bezpečné uložení hesla pomocí hashování

            $dir = "users/".$nickname;
            if (!file_exists($dir)) 
            {
                mkdir($dir, 0777, true);
            }


            $sql = "INSERT INTO user (nickname, mail, password) VALUES ('$nickname', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) 
            {
                $sql = "SELECT * FROM user WHERE nickname = '$nickname'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                session_start();
                $_SESSION['ID_user'] = $row['ID_user'];
                $_SESSION['nickname'] = $nickname;
                header("location: user.php");
                exit();
            } 
            else 
            {
                echo "Chyba: " . $sql . "<br>" . $conn->error; // Zobrazení chyby, pokud nastane problém při vkládání do databáze
            }

        }

    }

}
?>
