<?php
if (!isset($_COOKIE["lang"])) {
    $_COOKIE["lang"] = "ru";
}
if ($_COOKIE["lang"] == "en") {
    require ("en/dinamic_1.php");
}
else{
    $title = "Динамическая страница 1";
    require ("header.php");
    echo "<h3>Материалы</h3>
    <table>
        <tr><th>Id</th><th>Имя</th><th>Пароль</th></tr>";
        $mysqli = new mysqli("datab", "user", "password", "appDB");
        $result = $mysqli->query("SELECT * FROM material");
        foreach ($result as $row){
        echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
        }
    echo "</table>";
    require ("footer.php");
}
?>

