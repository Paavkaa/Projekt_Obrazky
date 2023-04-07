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

if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {

    $files = $_FILES['file'];
    //nastaveni adresare pro upload
    $upload_dir = './users/'.$_SESSION['nickname'] .'/' ;

    if(is_array($files['name'])) { // If multiple files, $files['name'] will be an array
        $file_count = count($files['name']);
    } else { // If one file, $files['name'] will be a string
        $file_count = 1;
    }

    // Loop through all the files
    for($i = 0; $i < $file_count; $i++) {

        // Get the file name and extension
        $filename = basename($files['name'][$i]);
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $file_name = pathinfo($filename, PATHINFO_FILENAME);
        $file_complete = $file_name . '.' . $file_ext;


        // Move the file to the upload directory
        $upload_file = $upload_dir . $file_complete;
        move_uploaded_file($files['tmp_name'][$i], $upload_file);

        // Insert the file into the database
        $sql = "INSERT INTO picture (nazev_pic, ID_alb) VALUES ('$file_complete' , '1')";
        $result = mysqli_query($conn, $sql);
    }

    echo "Images uploaded successfully.";

} else {
    echo "Please select an image file to upload.";
}
?>
