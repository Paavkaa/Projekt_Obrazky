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
            $_SESSION['ID_user'] = $row['ID_user'];
            $_SESSION['nickname'] = $nickname;
            header("location: user.php");
        }
        else
        {
            $error_msg2 = "Špatné heslo, nebo přezdívka!";
            header("location: login.php?error2=$error_msg2");
        }
    }
}

?>