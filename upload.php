<?php
declare(strict_types=1);

$uploaddir = "upload"; //директория для загрузки

function uploadingFile(string $uploaddir): void
{
    $uploadfile = $uploaddir . '\\' .  $_POST["file_name"]; //относительный путь к файлу

    if($_POST["file_name"] === "" || $_FILES['content']['name'] === "") {
     header('Location: http://localhost:8000/index.html');
    } else {
        move_uploaded_file($_FILES['content']['tmp_name'], $uploadfile);
        echo 'Файл ' . $_POST["file_name"] . '<br>' .
         'загружен в каталог ' . realpath(dirname($uploadfile)) . '<br>' . 
         'размер файла: ' . filesize($uploadfile);
    }
}

uploadingFile($uploaddir);
