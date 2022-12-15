<?php
    session_start();
    if (!isset($_COOKIE['lang'])){
        if (isset($_SESSION['lang'])) {
            $_COOKIE['lang'] = $_SESSION['lang'];
        }
        $_COOKIE['lang'] = "ru";
        $_SESSION['lang'] = "ru";
    }
    if (isset($_COOKIE['lang'])){
        $_SESSION['lang'] = $_COOKIE['lang'];
    }
    
    if (!isset($_COOKIE['theme'])){
        if (isset($_SESSION['theme'])) {
            $_COOKIE['theme'] = $_SESSION['theme'];
        }
        $_COOKIE['theme'] = "tem";
        $_SESSION['theme'] = "tem";
    }
    if (isset($_COOKIE['theme'])){
        $_SESSION['theme'] = $_COOKIE['theme'];
    }
    require_once 'settings.php';
    
    $app = new controller;
    
    class controller{

        protected $path; // Путь, разбитый на массив
        protected $model; // Объект модели
        protected $view; // Объект представления
        public function __construct(){
            // Подключение модели и представления
            $path = explode('/', trim($_SERVER['REDIRECT_URL'], '/'));
            if ($path[0] == "")
                header('Location: /index.html');
            require_once($_SERVER['DOCUMENT_ROOT'].'/model.php'); // Задание пути к модели
            require_once($_SERVER['DOCUMENT_ROOT'].'/view.php'); // Задание пути к представлению
            $model = 'model';
            $view = 'view';
            $this->path = $path;
            $this->model = new $model;
            $this->view = new $view;
            $this->pageSelect();
        }
    
        // Выбор страницы
        private function pageSelect(){
            if($this->path[0] == 'oper' && array_key_exists(1,$this->path)){
                $action = $this->path[1];
                $this->model->$action();
            }elseif($this->path[0] == 'dinamic_1.php'){
                $this->dinamic_1_Page();
            }elseif($this->path[0] == 'dinamic_2.php'){
                $this->dinamic_2_Page();
            }elseif($this->path[0] == 'admin.php'){
                $this->adminPage();
            }elseif($this->path[0] == 'downloader'){
                $this->filesPage();
            }
        }
    
        private function dinamic_1_Page(){
        $result = $this->model->selectDinamic1();
            $dataToView = array(
                "result" => $result
            );
            $this->view->rander('dinamic_1.php', $dataToView, "Динамическая 1");
        }

        private function dinamic_2_Page(){
            $result = $this->model->selectDinamic2();
            $dataToView = array(
                "result" => $result
            );
            $this->view->rander('dinamic_2.php', $dataToView, 'Динамическая 2');
        }

        private function adminPage(){
            $users = $this->model->selectUsers();
            $dataToView = array(
                "users" => $users
            );
            $this->view->rander('admin/admin.php', $dataToView, 'Админ панель');
        }

        private function filesPage(){
            $files = $this->model->selectFiles();
            $dataToView = array(
                "files" => $files
            );
            $this->view->rander('downloader/personal.php', $dataToView, 'PDF');
        }
    
    
    }
?>