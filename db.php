<?php
// Připojení k databázi pomocí mysqli
$servername = "localhost";
$username = "root";
$password = "";
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
    if ($result->num_rows > 0) {
        echo '<script>alert("Tento nickname již existuje. Zvolte prosím jiný.");</script>'; // Zobrazení varování, pokud již existuje uživatel se zadaným nickname
    } else {
        // Vložení nickname do databáze
        $email = $_POST['email'];

        $password = $_POST['password'];
        $password_check = $_POST['password2'];
         // Kontrola, zda se hesla shodují
        if ($password != $password_check) {
            echo '<script>document.getElementById("passwordError").style.display = "inline";</script>'; // Zobrazení varování pro neshodující se hesla
        }
    
        // Kontrola, zda heslo splňuje minimální délku
        if (strlen($password) < 8) {
            echo '<script>document.getElementById("passwordLength").style.display = "inline";</script>'; // Zobrazení varování pro krátké heslo
    }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Bezpečné uložení hesla pomocí hashování
        
        $sql = "INSERT INTO user (nickname, mail, password) VALUES ('$nickname', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Registrace proběhla úspěšně!");</script>'; // Zobrazení zprávy o úspěšné registraci
        } else {
            echo "Chyba: " . $sql . "<br>" . $conn->error; // Zobrazení chyby, pokud nastane problém při vkládání do databáze
        }
    }


}


?>