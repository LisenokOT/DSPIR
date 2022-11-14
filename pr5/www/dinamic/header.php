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

$themeStyleSheet = 'http://localhost:8080/style1.css';
if (!empty($_COOKIE['theme']) && $_COOKIE['theme'] == 'tem') {
    $themeStyleSheet = 'http://localhost:8080/style2.css';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?$title?></title>
        <meta charset="UTF-8">
        <meta name="author" content="Тарарина Ольга">
        <meta name="description" content="practic3">
        <meta name="keywords" content="РСЧИР, php, HTML, CSS">
        <link rel="stylesheet" href="<?echo $themeStyleSheet;?>"/>
    </head>
    <body>
        <header>
            <a id="logo-ref" href="#"><img id="logo" src="https://cdn-icons-png.flaticon.com/512/3698/3698156.png" alt="Логотип"></a>
            <nav>
                <a href="http://localhost:8080/index.html">Главная</a>
                <a href="http://localhost:8080/str2.html">Раздел общий</a>
                <a href="http://localhost:8080/dinamic_1.php">Раздел 1</a>
                <a href="http://localhost:8080/dinamic_2.php">Раздел 2</a>
                <a href="http://localhost:8080/admin/admin.php">Админ панель</a>
                <a href="http://localhost:8080/downloader/personal.php">Работа с файлами</a>
                <a id="lang-button">Сменить язык</a>
                <a id="thema-button">Сменить тему</a>
            </nav>
        </header>