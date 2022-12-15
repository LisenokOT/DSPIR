<?php
if ($_COOKIE["lang"] == "en") {
    echo "<h3>Goods for home and garden</h3>
    <table>
    <tr><th>Id</th><th>Name</th><th>Price</th></tr>";
}
else {
    echo "<h3>Товары для сада и огорода</h3>
    <table>
    <tr><th>Id</th><th>Название</th><th>Цена</th></tr>";
}
    foreach ($data['result'] as $row){
        echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
    }
    echo "</table>";
?>

