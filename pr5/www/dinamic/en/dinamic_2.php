<?php
    $title = "Page 2";
    include ("en/header.php");
?>

<h3>Goods for home and garden</h3>
<table>
    <tr><th>Id</th><th>Name</th><th>Price</th></tr>
<?php
$mysqli = new mysqli("datab", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM home");
foreach ($result as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
}
?>
</table>

<!-- футер (footer.php) -->
<?php include ("footer.php");?>