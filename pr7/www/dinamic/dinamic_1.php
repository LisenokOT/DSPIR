<?php
if ($_COOKIE["lang"] == "en") {
    echo "<h3>Materials</h3>
    <table>
    <tr><th>Id</th><th>Name</th><th>price</th></tr>";
}
else {
    echo "<h3>Материалы</h3> 
    <table>
    <tr><th>Id</th><th>Имя</th><th>Пароль</th></tr>";
}

    foreach ($data['result'] as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
    }
echo "</table>";
?>