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

if (isset($_POST['submit'])) 
{
    $files = $_FILES['file'];
    $count = count($_FILES['file']['name']);
    $ID_alb = $_GET['id'];

    if (count($_FILES['file']['name']) == 0) {
        echo "Chyba: nebyl vybrán žádný soubor pro nahrání.";
        exit;
    }

    for ($i=0; $i < $count; $i++) 
    { 
        $fileName = $_FILES['file']['name'][$i];
        $fileTmpName = $files['tmp_name'][$i];
        $fileDestination = './users/'. $_SESSION['nickname'] .'/'.$fileName;

        /* Kontrola, zda soubor již existuje */
        if (file_exists($fileName)) 
        {
            $error_msg1 = "Soubor s tímto názvem již existuje.";
            header("location: new_pic.php?id=$ID_alb&error1=$error_msg1");
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
                        $error_msg2 = "Soubor nebyl úspěšně nahrán na server.";
                        header("location: new_pic.php?id=$ID_alb&error2=$error_msg2");
                    }
                } else {
                    header("location: new_pic.php?id=$ID_alb&error2=$error_msg2");
                }
    
                $sql = "INSERT INTO picture (nazev_pic, ID_alb) VALUES ('$fileName', '$ID_alb')";
    
                if (!mysqli_query($conn, $sql)) 
                {
                   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                } 
                
            }
    }

     header("location: album.php?id=$ID_alb");
        
}

?>
