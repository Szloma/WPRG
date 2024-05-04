<?php
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $uploadFileDir = './uploaded_files/';
    $dest_path = $uploadFileDir . $newFileName;
    if(move_uploaded_file($fileTmpPath, $dest_path))
    {
        $message ='Plik został pomyślnie wrzucony na serwer.';
    }
    else
    {
        $message = 'Plik nie mógł zostać wrzucony na serwer';
    }

    if ($file = fopen($dest_path, "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            echo $line;
            # do same stuff with the $line
        }
        fclose($file);
    }

}
?>