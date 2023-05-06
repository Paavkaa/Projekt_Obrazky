<?php
$servername = "md200.wedos.net";
$username = "a93646_pavelk";
$password = "puquMcUe";
$dbname = "d93646_pavelk";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$ID_user = $_SESSION['ID_user'];

if(isset($_POST['submit']))
{

    //* údaje z formuláře
    $rename = $_POST['rename'];
    $new_mail = $_POST['mail'];
    $password_old = $_POST['password_old'];
    $password_new1 = $_POST['password_new1'];
    $password_new2 = $_POST['password_new2'];

    // hashování hesla
    $hashed_password = password_hash($password_new2, PASSWORD_DEFAULT);

    //* údaje z DB
    $sql = "SELECT * FROM user WHERE ID_user = '$ID_user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    //uživatel
    $name = $row['nickname'];
    $mail = $row['mail'];
    $password = $row['password'];

    //kontrola unikátnosti dat
    $sql_name = "SELECT nickname FROM user WHERE nickname = '$rename'";
    $result_name = mysqli_query($conn, $sql_name);
    $row_name = mysqli_fetch_assoc($result_name);
    $count_name = mysqli_num_rows($result_name);

    $sql_mail = "SELECT mail FROM user WHERE mail = '$new_mail'";
    $result_mail = mysqli_query($conn, $sql_mail);
    $row_mail = mysqli_fetch_assoc($result_mail);
    $count_mail = mysqli_num_rows($result_mail);

    //změna přezdívky
    if(!empty($rename))
    {
        if($count_name > 0)
        {
            $error_msg1 = "Tato přezdívka již existuje";
            header("Location: setting_user.php?error=$error_msg1");
            exit;
        }

        $sql = "UPDATE user SET nickname = '$rename' WHERE ID_user = '$ID_user'";
        $_SESSION['nickname'] = $rename;
        $result = mysqli_query($conn, $sql);
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

        $sql = "UPDATE user SET mail = '$mail' WHERE ID_user = '$ID_user'";
        $result = mysqli_query($conn, $sql);
    }
    //změna hesla
    if(!empty($password_old) && !empty($password_new1) && !empty($password_new2))
    {
        if (password_verify($password_old, $password) && $password_new1 == $password_new2)
        {
            $sql = "UPDATE user SET password = '$hashed_password' WHERE ID_user = '$ID_user'";
            $result = mysqli_query($conn, $sql);
            $password = $hashed_password;
        }
        else
        {
            $error_msg3 = "Změna hesla se nezdařila";
            header("Location: setting_user.php?error=$error_msg3");
            exit;
        }
    }

    header("Location: user.php");
}