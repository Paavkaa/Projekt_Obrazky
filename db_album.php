<?php
require 'connect.php';

if(!isset($_SESSION)) 
{
    session_start();
}

// Kontrola připojení
if (!$conn) {
die("Připojení se nezdařilo: " . mysqli_connect_error());
}

//! VYTVOŘENÍ ALBA
if (isset($_POST['submit'])) 
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $ID_user = $_SESSION['ID_user'];
    $public = 0;
    $sql = "SELECT * FROM album WHERE nazev_alb = ? AND ID_u = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        echo "SQL statement failed";
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "si", $name, $ID_user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (isset($_POST['checkbox'])) 
        {
            $public = 1;
        }
        else
        {
            $public = 0;
        }
    
        if (empty($name)) 
        {
            $error_msg1 = "Název alba je prázdný!";
            header("location: new_alb.php?error=$error_msg1");
            exit();
        }
        if ($result->num_rows > 0) 
        {
            $error_msg2 = "Název alba je již použitý!";
            header("location: new_alb.php?error=$error_msg2");
            exit();
        }
        else
        {
            $sql = "INSERT INTO album (nazev_alb, ID_u, public) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) 
            {
                echo "SQL statement failed";
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "sii", $name, $ID_user, $public);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
            header("location: user.php");
        }
    }
    
}