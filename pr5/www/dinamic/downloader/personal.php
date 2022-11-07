<!-- хедер (header.php) -->
<?php
    $title = "PDF";
    include ("../header.php");
?>
<?php $mysqli = new mysqli("datab", "user", "password", "appDB"); ?>
<form enctype="multipart/form-data" action="install.php" method="POST">
    <div>
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
        <br>
        <label for="file_field">Отправить ваш файл:</label>
        <br>
        <input id="file_field" name="userfile" type="file"/>
    </div>
    <br>
    <input type="submit" value="Отправить файл"/>
</form>
<h1>Таблица загруженных файлов</h1>

    <?php
    $files = scandir('./downloads');
    if (count($files) <= 2) {
        echo "<h2>Нет загруженных файлов</h2>";
    } else {
        echo "<h2>Загруженные файлы</h2>";
        echo"<table border=1>
            <tr>
                <th>number</th>
                <th>Name</th>
            </tr>";
        $i = 1;
        foreach ($files as $file) {
            if ($file != "." and $file != "..") {
            echo "<tr><td>$i</td><td><a  href='./downloads/".$file."'>".$file."</a></td></tr>";
            $i += 1;
            }
        }
    }
    ?>
</table>

<!-- футер (footer.php) -->
<?php include ("../footer.php");?>