<!-- хедер (header.php) -->
<?php
if (!isset($_COOKIE["lang"])) {
    $_COOKIE["lang"] = "ru";
}
if ($_COOKIE["lang"] == "en") {
    include ("en/dinamic_2.php");
}
else{
    $title = "Динамическая страница 2";
    include ("header.php");
    echo "<h3>Товары для сада и огорода</h3>
    <table>
        <tr><th>Id</th><th>Название</th><th>Цена</th></tr>";
        $mysqli = new mysqli("datab", "user", "password", "appDB");
        $result = $mysqli->query("SELECT * FROM home");
        foreach ($result as $row){
        echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
        }
    echo "</table>";
    include ("footer.php");
}
?>