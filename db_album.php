<?php
if(!isset($_SESSION)) 
{
    session_start();
}

$servername = "md200.wedos.net";
$username = "a93646_pavelk";
$password = "puquMcUe";
$dbname = "d93646_pavelk";

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
    $sql = "SELECT * FROM album WHERE nazev_alb = '$name' AND ID_u = '$ID_user'";
    $result = $conn->query($sql);

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
        $sql = "INSERT INTO album (nazev_alb, ID_u, public) VALUES ('$name', '$ID_user', '$public')";
        
        if (mysqli_query($conn, $sql)) 
        {
            header("location: user.php");
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
}