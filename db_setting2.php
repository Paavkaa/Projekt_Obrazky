<?php
require 'connect.php';

$ID_user = $_SESSION['ID_user'];

if(isset($_POST['submit']))
{

    //* údaje z formuláře
    $rename = mysqli_real_escape_string($conn, $_POST['rename']);
    $new_mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $password_old = mysqli_real_escape_string($conn, $_POST['password_old']);
    $password_new1 = mysqli_real_escape_string($conn, $_POST['password_new1']);
    $password_new2 = mysqli_real_escape_string($conn, $_POST['password_new2']);

    // hashování hesla
    $hashed_password = password_hash($password_new2, PASSWORD_DEFAULT);

    //* údaje z DB
    $sql = "SELECT * FROM user WHERE ID_user = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: setting_user.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $ID_user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        //uživatel
        $name = $row['nickname'];
        $mail = $row['mail'];
        $password = $row['password'];
    
        //kontrola unikátnosti dat
        $sql_name = "SELECT nickname FROM user WHERE nickname = ?";
        $stmt_name = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt_name, $sql_name))
        {
            header("Location: setting_user.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt_name, "s", $rename);
            mysqli_stmt_execute($stmt_name);
            $result_name = mysqli_stmt_get_result($stmt_name);
            $row_name = mysqli_fetch_assoc($result_name);
            $count_name = mysqli_num_rows($result_name);
        }
    
        $sql_mail = "SELECT mail FROM user WHERE mail = ?";
        $stmt_mail = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt_mail, $sql_mail))
        {
            header("Location: setting_user.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt_mail, "s", $new_mail);
            mysqli_stmt_execute($stmt_mail);
            $result_mail = mysqli_stmt_get_result($stmt_mail);
            $row_mail = mysqli_fetch_assoc($result_mail);
            $count_mail = mysqli_num_rows($result_mail);
        }
    
        //změna přezdívky
        if(!empty($rename))
        {
            if($count_name > 0)
            {
                $error_msg1 = "Tato přezdívka již existuje";
                header("Location: setting_user.php?error=$error_msg1");
                exit;
            }
    
            $sql = "UPDATE user SET nickname = ? WHERE ID_user = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: setting_user.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ss", $rename, $ID_user);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $_SESSION['nickname'] = $rename;
            }
        }
        //změna mailu
        if(!empty($mail))
        {
    
            if($count_mail > 0)
            {
                $error_msg2 = "Tento mail je používán jiným účtem";
                header("Location: setting_user.php?error=$error_msg2");
                exit;
            }
    
            $sql = "UPDATE user SET mail = ? WHERE ID_user = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: setting_user.php?error=sqlerror");
                exit();
            }
            else
            {
                if (!filter_var($new_mail, FILTER_VALIDATE_EMAIL)) 
                {
                    $error_msg3 = "Neplatný formát e-mailu!";
                    header("location: setting_user.php?error=$error_msg3");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ss", $new_mail, $ID_user);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }

                
            }
        }
        //změna hesla
        if(!empty($password_old) && !empty($password_new1) && !empty($password_new2))
        {
            if (password_verify($password_old, $password) && $password_new1 == $password_new2)
            {
                $sql = "UPDATE user SET password = ? WHERE ID_user = ?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: setting_user.php?error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $ID_user);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $password = $hashed_password;
                }
            }
            else
            {
                $error_msg4 = "Změna hesla se nezdařila";
                header("Location: setting_user.php?error=$error_msg4");
                exit;
            }
        }
    
        header("Location: user.php");
    }
}