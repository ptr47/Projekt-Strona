<?php
if(isset($_FILES['pfp'])) {
    $file = $_FILES['pfp'];

    if ($file['error'] === 0) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($fileType, $allowedTypes)) {
            $newFileName = uniqid() . '_' . $fileName;
            
            move_uploaded_file($fileTmpName, 'img/pfp/' . $newFileName);
            
            echo "Plik został przesłany poprawnie.";
        } else {
            header("location: ../user_panel.php?err=format");
        }
    } else {
        echo "Błąd podczas przesyłania pliku: " . $file['error'];
    }
}
