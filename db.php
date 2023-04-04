<?php
// Připojení k databázi pomocí mysqli
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "obrazky";

// Vytvoření připojení
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kontrola připojení
if (!$conn) {
    die("Připojení se nezdařilo: " . mysqli_connect_error());
}

// Vložení údajů

if(isset($_POST['submit']))
{
    $nickname = $_POST['username'];
    $sql = "SELECT * FROM user WHERE nickname = '$nickname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        $error_msg1 = "Přezdívka je již použitá!";
        header("location: register.php?error1=$error_msg1");

        exit();
        /* die("přezdívka je již použita"); */
    }

    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE mail = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        $error_msg2 = "E-mail je již použitý!";
        header("location: register.php?error2=$error_msg2");

        exit();
        /* die("e-mail je již použitý"); */
    } 
    else 
    {
        $password = $_POST['password'];
        $password_check = $_POST['password2'];

         // Kontrola, zda se hesla shodují
        if ($password != $password_check) 
        {
            die("hesla se neshodují");
        }
    
        // Kontrola, zda heslo splňuje minimální délku
        if (strlen($password) < 8) 
        {
            die("heslo je krátké");
        }
        else
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Bezpečné uložení hesla pomocí hashování
            
            $sql = "INSERT INTO user (nickname, mail, password) VALUES ('$nickname', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) 
            {
                echo '<script>alert("Registrace proběhla úspěšně!");</script>'; // Zobrazení zprávy o úspěšné registraci
            } 
            else 
            {
                echo "Chyba: " . $sql . "<br>" . $conn->error; // Zobrazení chyby, pokud nastane problém při vkládání do databáze
            }

        }

    }

}

?>
