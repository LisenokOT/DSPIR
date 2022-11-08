<!-- хедер (header.php) -->
<?php
    $title = "Page 1";
    include ("header.php");
?>

<h3>Users</h3>
<table>
    <tr><th>Id</th><th>Name</th><th>Password</th></tr>
<?php
$mysqli = new mysqli("datab", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM users");
foreach ($result as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['password']}</td></tr>";
}
?>
</table>

<!-- футер (footer.php) -->
<?php include ("footer.php");?>
