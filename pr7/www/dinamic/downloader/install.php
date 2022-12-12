<?php
$uploaddir = '/var/www/dinamic/downloader/downloads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
setlocale(LC_ALL, 'en_US.UTF-8');
$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
if ($ext != "pdf") {
    echo "Это не pdf файл!!! Выберите  pdf для загрузки";
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        exec('file ' . $uploadfile, $ext);
        $status = strripos($ext[0], 'pdf document');
        if ($status == True){
            echo "Файл корректен и был успешно загружен.\n";
        }
        else {
            $temp = array();
            exec('rm ' . $uploadfile, $temp);
            echo "<h3>Это не pdf файл!</h3>";
        }
    }
}

echo "</pre>";
?>
<a href="personal.php">К списку</a>