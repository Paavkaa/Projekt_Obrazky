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


if(isset($_POST['submit']))
{
    $nickname = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE nickname = '$nickname'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) 
    {
        $error_msg1 = "Přezdívka neexistuje!";
        header("location: login.php?error1=$error_msg1");
    }
    else
    {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        if (password_verify($password, $stored_password)) 
        {
            session_start();
            $_SESSION['nickname'] = $nickname;
            header("location: user.php");
        }
        else
        {
            $error_msg2 = "Špatné heslo!";
            header("location: login.php?error2=$error_msg2");
        }
    }
}

?>