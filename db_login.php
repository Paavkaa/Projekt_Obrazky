<?php

require 'connect.php';

// Kontrola připojení
if (!$conn) {
die("Připojení se nezdařilo: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{
    $nickname = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "SELECT * FROM user WHERE nickname = ?";
    $stmt = $conn->prepare($sql);
    if(!mysqli_stmt_init($conn))
    {
        header("location: login.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $nickname);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
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
}

?>