<?php

class view{
    // Рендер нужного вида 
    public function rander($path, $data = [], $title = 'Страница'){ // Путь к виду, данные, доп вид (не обяз)
        $path = $_SERVER['DOCUMENT_ROOT'].'/'.$path;
        if (file_exists($path)){
            $content = ob_get_clean();
            $content = $this->randHeader($content, $data, $title);
            require $path;
            $content = $this->randFooter($content, $data);
            echo $content;
        }
        else
            header('Location: /index.html');
        exit;
    }

    // Рендер доп контента (шапки и подвала)
    private function randHeader($content, $data, $title){
        $path = $_SERVER['DOCUMENT_ROOT'].'/header.php';
        if (file_exists($path)){
            ob_start();
            require $path;
        }
        else
            header('Location: /index.html');
    }
    private function randFooter($content, $data){
        $pathfooter = $_SERVER['DOCUMENT_ROOT'].'/footer.php';
        if (file_exists($pathfooter)){
            ob_start();
            require $pathfooter;
            return ob_get_clean();
        }
        else
            header('Location: /index.html');
    }
}