<?php
if(isset($_FILES['pfp'])) {
    $file = $_FILES['pfp'];

    if ($file['error'] === 0) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];

var_dump($fileName);
var_dump($fileTmpName);
var_dump($fileType);

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            //TO DO: save pictures to database

            // Saving files doesnt work(?)
            // $newFileName = uniqid() . '_' . $fileName;
            // $fileDestination = 'pfp/' . $newFileName;
            // if(!move_uploaded_file($fileTmpName, $fileDestination)) {
            //     echo "Wystąpił błąd podczas zapisywania pliku.";
            // }
        } else {
            header("location: ../user_panel.php?err=format");
        }
    } else {
        echo "Błąd podczas przesyłania pliku: " . $file['error'];
    }
}
if(isset($_POST['birthdate'])) {

    var_dump($_POST['birthdate']);
$birthdate=date('', strtotime($_POST['']));
}
// TO DO: change for password and email