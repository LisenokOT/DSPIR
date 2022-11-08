<!-- хедер (header.php) -->
<?php
    $title = "Динамическая страница 1";
    include ("header.php");
?>

<h3>Пользователи</h3>
<table>
    <tr><th>Id</th><th>Name</th><th>Password</th></tr>
<?php
$mysqli = new mysqli("datab", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM users");
echo "<p>$result->num_rows</p>";
foreach ($result as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['password']}</td></tr>";
}
?>
</table>

<!-- футер (footer.php) -->
<?php include ("footer.php");?>
