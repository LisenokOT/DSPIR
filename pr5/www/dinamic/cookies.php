<?php 
if( empty(session_id()) && !headers_sent()){
    session_start();
}
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