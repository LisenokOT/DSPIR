<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Тарарина Ольга">
    <meta name="description" content="practic2">
    <meta name="keywords" content="РСЧИР, php, HTML, CSS">
    <link rel="stylesheet" href="style.css">
    <title>Drawer</title>
</head>
<body>

    <div>
        <?php
            function print_cmd($cmd){
                $lines = array();
                exec($cmd, $lines);
                echo "<p» " . $cmd . "</p>";
                echo "<pre>" . implode("\n", $lines) . "</pre>";
            }

            $command_list = array('ps', 'ls', 'whoami', 'id', 'echo');
            echo "<p>Было введено: </p>", $_GET["cmd"], "<p>Выведено: </p>";
            if (in_array(explode(" ", $_GET["cmd"])[0], $command_list)){
                print_cmd($_GET["cmd"]);
            } else {
                echo "<p>Введите команду из списка: </p>";
                echo implode(", ", $command_list);
            }
        ?>
    </div>
</body>
</html>

