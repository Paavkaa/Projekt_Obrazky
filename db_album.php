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
if (isset($_POST['name'])) 
{
    $name = $_POST['name'];
    $user_id = $_SESSION['ID_user'];
    $public = 0;
    if (isset($_POST['checkbox'])) {
        $public = 1;
    }
    $dir_path = "./user/".$name."/";
    
    $sql = "SELECT * FROM album WHERE nazev_alb = '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        $error_msg = "Album s tímto názvem již existuje!";
        header("location: new_alb.php?error=$error_msg");
    }
    else
    {
        $sql = "INSERT INTO album (nazev_alb, ID_u, public) VALUES ('$name', '$user_id', '$public')";
        mkdir($dir_path);
        $result = $conn->query($sql);
    }
    

    //! VLOŽENÍ OBRÁZKŮ
    $sql = "SELECT ID_alb FROM album WHERE nazev_alb = '$name'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $alb_id = $row['ID_alb'];
    $target_dir = $dir_path;

    $image_count = count($_FILES['files']['name']);
    for($i=0; $i<$image_count; $i++)
    {
        $target_file = $target_dir . pathinfo($_FILES["files"]["name"][$i], PATHINFO_FILENAME) . $i . "." . $imageFileType;
        $target_file = str_replace(' ', '', $target_file); // Odstranění mezer z názvu souboru
        $target_file = preg_replace('/[^A-Za-z0-9\-_\.]/', '', $target_file); // Odstranění nepovolených znaků z názvu souboru
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["files"]["tmp_name"][$i]);
        if($check !== false) 
        {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
        {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        } 
        else
        {
        if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file.$i))
        {
        echo "The file ". htmlspecialchars( basename( $_FILES["files"]["name"][$i])). " has been uploaded.";
        $target_file = $target_dir . basename($_FILES["files"]["name"][$i]).$i;
        $sql = "INSERT INTO obrazek (nazev_pic, ID_alb) VALUES ('$target_file', '$alb_id')";
        $result = $conn->query($sql);
        }
        else
        {
        echo "Sorry, there was an error uploading your file.";
        }
        }
        
    }
    mysqli_close($conn);
    header("location: user.php");
    exit();
}