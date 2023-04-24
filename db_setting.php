<?php
$servername = "md200.wedos.net";
$username = "a93646_pavelk";
$password = "puquMcUe";
$dbname = "d93646_pavelk";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//! NASATVENÍ ALBA
if(isset($_POST['submit']))
{
    $ID_alb = $_GET['id'];
    $sql = "SELECT * FROM album WHERE ID_alb = '$ID_alb'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if(isset($_POST['rename']) && !empty($_POST['rename']))
    {
        $rename = $_POST['rename'];
    
        $sql_check = "SELECT * FROM album WHERE nazev_alb = '$rename' AND ID_alb != '$ID_alb'";
        $result_check = mysqli_query($conn, $sql_check);
        if(mysqli_num_rows($result_check) > 0)
        {
            $error_msg = "Název alba již existuje. Zvolte jiný název.";
            header("location: setting_alb.php?id=$ID_alb&error=$error_msg");
            exit();
        }
    }
    else
    {
        $rename = $row['nazev_alb'];
    }

    if(isset($_POST['checkbox']))
    {
        $public = 1;
    }
    else
    {
        $public = 0;
    }


    $sql = "UPDATE album SET nazev_alb = '$rename', public = '$public' WHERE ID_alb = '$ID_alb'";
    mysqli_query($conn, $sql);
    header("location: album.php?id=$ID_alb");
}

if(isset($_POST['delete']))
{
    $ID_alb = $_GET['id'];
    
    $sql = "DELETE FROM picture WHERE ID_alb = '$ID_alb'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM album WHERE ID_alb = '$ID_alb'";
    mysqli_query($conn, $sql);
    header("location: user.php");
}


?>