<?php

class model{
    public function selectUsers(){
        $mysqli = openmysqli();
        $result = $mysqli->query("SELECT * FROM user");
        $mysqli->close(); 
        return $result;
    }

    public function selectDinamic1(){
        $mysqli = openmysqli();
        $result = $mysqli->query("SELECT * FROM material");
        $mysqli->close(); 
        return $result;
    }

    public function selectDinamic2(){
        $mysqli = openmysqli();
        $result = $mysqli->query("SELECT * FROM home");
        $mysqli->close(); 
        return $result;
    }

    public function selectFiles() {
        $files = scandir('./downloader/downloads');
        if (count($files) <= 2) {
            $result = NULL;
        } else {
            $result = $files;
        return $result;
        }   
    }

    public function AddFiles(){
        if($_FILES['file']){
            $uploaddir = '/var/www/dinamic/downloader/downloads/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);

            echo '<pre>';
            setlocale(LC_ALL, 'en_US.UTF-8');
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if ($ext != "pdf") {
                echo "Это не pdf файл!!! Выберите  pdf для загрузки";
            } else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
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
                echo '</pre>
                <a href="/downloader/personal.php">К списку</a>';
        }else
            header('Location: /downloader/personal.php');
    }

}