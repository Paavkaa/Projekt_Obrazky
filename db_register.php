<?php
session_start();
require 'connect.php';

// Kontrola připojení
if (!$conn) {
die("Připojení se nezdařilo: " . mysqli_connect_error());
}

//! REGISTRACE UŽIVATELE
if(isset($_POST['submit']))
{
    $nickname = mysqli_real_escape_string($conn, $_POST['username']);
    $sql = "SELECT * FROM user WHERE nickname = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        echo "SQL statement failed";
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $nickname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

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
    
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "SELECT * FROM user WHERE mail = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) 
        {
            echo "SQL statement failed";
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
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
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $password_check = mysqli_real_escape_string($conn, $_POST['password2']);
        
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
        
        
                    $sql = "INSERT INTO user (nickname, mail, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) 
                    {
                        echo "Chyba: " . $sql . "<br>" . $conn->error; // Zobrazení chyby, pokud nastane problém při vkládání do databáze
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt, "sss", $nickname, $email, $hashed_password);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
            
                        $sql = "SELECT * FROM user WHERE nickname = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) 
                        {
                            echo "SQL statement failed";
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "s", $nickname);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $row = $result->fetch_assoc();
            
                            session_start();
                            $_SESSION['ID_user'] = $row['ID_user'];
                            $_SESSION['nickname'] = $nickname;
                            header("location: user.php");
                            exit();
                        }
                    }
        
                }
        
            }
        }
    }

}
?>
