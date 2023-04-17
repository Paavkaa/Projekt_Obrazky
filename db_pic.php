<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "obrazky";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Připojení se nezdařilo: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) 
{
    $files = $_FILES['file'];
    $count = count($_FILES['file']['name']);
    $ID_alb = $_GET['id'];

    for ($i=0; $i < $count; $i++) { 
        $fileName = $_FILES['file']['name'][$i];
        $fileTmpName = $files['tmp_name'][$i];
        $fileDestination = './users/'. $_SESSION['nickname'] .'/'.$fileName;

        if (is_uploaded_file($fileTmpName)) {
            if (!file_exists('./users/'.$_SESSION['nickname'])) {
                mkdir('./users/'.$_SESSION['nickname']);
            }
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "Soubor byl úspěšně nahrán a uložen do složky './users/". $_SESSION['nickname'] ."'.";
            } else {
                echo "Při ukládání souboru došlo k chybě.";
            }
        } else {
            echo "Soubor nebyl úspěšně nahrán na server.";
        }

        $sql = "INSERT INTO picture (nazev_pic, ID_alb) VALUES ('$fileName', '$ID_alb')";

        if (mysqli_query($conn, $sql)) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    header("Location: album.php?id=$ID_alb");
}

?>
