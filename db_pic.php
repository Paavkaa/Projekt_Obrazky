<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

require 'connect.php';


    // Kontrola připojení
    if (!$conn) {
    die("Připojení se nezdařilo: " . mysqli_connect_error());
    }

if (isset($_POST['submit'])) 
{
    $files = $_FILES['file'];
    $count = count($_FILES['file']['name']);
    $ID_alb = $_GET['id'];

    if(empty($_FILES['file']['name'][0]))
    {
        $error_msg1 = "Musíš vložit aspoň jeden obrázek.";
        header("location: new_pic.php?id=$ID_alb&error=$error_msg1");
        exit;
    }

    for ($i=0; $i < $count; $i++) 
    { 
        $fileName =mysqli_real_escape_string($conn, $_FILES['file']['name'][$i]);
        $fileTmpName = $files['tmp_name'][$i];
        $fileDestination = './users/'. $_SESSION['nickname'] .'/'.$fileName;

        /* Kontrola, zda soubor již existuje */
        if (file_exists($fileName)) 
        {
            $error_msg2 = "Soubor s tímto názvem již existuje.";
            header("location: new_pic.php?id=$ID_alb&error=$error_msg2");
            exit;
        }
        else
        {
            /* Kontrola, zda je soubor obrázek */
            $check = getimagesize($fileTmpName);
            if($check !== false) {
                /* echo "Soubor je obrázek - " . $check["mime"] . "."; */
            } 
            else 
            {
                echo "Soubor není obrázek.";
                exit;
            }
                    /* Nahrání obrázku */
                if (is_uploaded_file($fileTmpName)) {
                    if (!file_exists('./users/'.$_SESSION['nickname'])) {
                        mkdir('./users/'.$_SESSION['nickname']);
                    }
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        /* echo "Soubor byl úspěšně nahrán a uložen do složky './users/". $_SESSION['nickname'] ."'."; */
                    } else {
                        $error_msg3 = "Soubor nebyl úspěšně nahrán na server.";
                        header("location: new_pic.php?id=$ID_alb&error=$error_msg3");
                    }
                } else {
                    header("location: new_pic.php?id=$ID_alb&error=$error_msg3");
                }
    
                $sql = "INSERT INTO picture (nazev_pic, ID_alb) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_bind_param($stmt, "si", $fileName, $ID_alb);
                    mysqli_stmt_execute($stmt);
                }
            }
    }

     header("location: album.php?id=$ID_alb");
        
}

?>
