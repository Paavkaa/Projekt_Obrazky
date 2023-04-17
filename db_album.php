<?php
session_start();

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

//! VYTVOŘENÍ ALBA
if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $ID_user = $_SESSION['ID_user'];
    $public = 0;
    if (isset($_POST['checkbox'])) 
    {
        $public = 1;
    }
    else
    {
        $public = 0;
    }
    
    $sql = "INSERT INTO album (nazev_alb, ID_user, public) VALUES ('$name', '$ID_user', '$public')";
    
    if (mysqli_query($conn, $sql)) 
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}