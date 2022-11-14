<?php 
include ("cookies.php");
?>

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
            <a href="http://localhost:8080/index.html">Home</a>
            <a href="http://localhost:8080/str2.html">General section</a>
            <a href="http://localhost:8080/dinamic_1.php">Section 1</a>
            <a href="http://localhost:8080/dinamic_2.php">Section 2</a>
            <a href="http://localhost:8080/admin/admin.php">Admin panel</a>
            <a href="http://localhost:8080/downloader/personal.php">Working with files</a>
            <a id="lang-button">Change language</a>
            <a id="thema-button">Change theme</a>
        </nav>
    </header>