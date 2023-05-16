<?php
session_start();
require 'connect.php';

$ID_alb = $_GET['id'];

$ID_user = $_SESSION['ID_user'];
$sql = "SELECT * FROM user WHERE ID_user = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql))
{
    echo "Chyba". $sql . "<br>" . mysqli_error($conn);
}
else
{
    mysqli_stmt_bind_param($stmt, "i", $ID_user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
}

$password_db = $row['password'];

//! NASATVENÍ ALBA
if(isset($_POST['submit']))
{
    $password =  $_POST['password_sub'];

    if(password_verify($password, $password_db))
    {
        $sql = "SELECT * FROM album WHERE ID_alb = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "Chyba". $sql . "<br>" . mysqli_error($conn);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "i", $ID_alb);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }
        
        if(isset($_POST['rename']) && !empty($_POST['rename']))
        {
            $rename = mysqli_real_escape_string($conn, $_POST['rename']);
        
            $sql_check = "SELECT * FROM album WHERE nazev_alb = ? AND ID_alb != ?"; //? Kontrola, zda není shoda jména s jiným albem
            $stmt_check = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt_check, $sql_check))
            {
                echo "Chyba". $sql_check . "<br>" . mysqli_error($conn);
            }
            else
            {
                mysqli_stmt_bind_param($stmt_check, "si", $rename, $ID_alb);
                mysqli_stmt_execute($stmt_check);
                $result_check = mysqli_stmt_get_result($stmt_check);
                
                if(mysqli_num_rows($result_check) > 0)
                {
                    $error_msg = "Název alba již existuje. Zvolte jiný název.";
                    header("location: setting_alb.php?id=$ID_alb&error=$error_msg");
                    exit;
                }
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
    
    
        $sql = "UPDATE album SET nazev_alb = ?, public = ? WHERE ID_alb = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "Chyba". $sql . "<br>" . mysqli_error($conn);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "sii", $rename, $public, $ID_alb);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: album.php?id=$ID_alb");
        }

    }
    else
    {
        $error_msg = "Špatné heslo";
        header("location: setting_alb.php?id=$ID_alb&error=$error_msg");
        exit;
    }
}

if(isset($_POST['delete']))
{
    $password = $_POST['password_del'];

    if(password_verify($password, $password_db))
    {
        $ID_alb = mysqli_real_escape_string($conn, $_GET['id']);
        
        //odstranění záznamu z DB
        $sql = "DELETE FROM picture WHERE ID_alb = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "Chyba". $sql . "<br>" . mysqli_error($conn);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "i", $ID_alb);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        $sql = "DELETE FROM album WHERE ID_alb = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "Chyba". $sql . "<br>" . mysqli_error($conn);
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "i", $ID_alb);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        header("location: user.php");
        exit;
    }
    else
    {
        $error_msg = "Špatné heslo";
        header("location: setting_alb.php?id=$ID_alb&error=$error_msg");
    }


}


?>