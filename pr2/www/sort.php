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
            //Сортировка вставками
            function insertSort(array $arr) {
                $count = count($arr);
                if ($count <= 1) {
                    return $arr;
                }
                
                for ($i = 1; $i < $count; $i++) {
                    $cur_val = $arr[$i];
                    $j = $i - 1;
                
                    while (isset($arr[$j]) && $arr[$j] > $cur_val) {
                        $arr[$j + 1] = $arr[$j];
                        $arr[$j] = $cur_val;
                        $j--;
                    }
                }
                
                return $arr;
            }
            if (isset($_GET['array'])) {
                // Массив
                echo "<p>Массив</p>\n<p>[";
                echo implode(", ", explode(",", $_GET["array"]));
                
                // Отсортированный массив
                echo "]</p>\n<p>Отсортированный массив</p>\n<p>[";
                echo implode(", ", insertSort(explode(",", $_GET["array"])));
                echo "]</p>";
            } else {
                echo '<p>Отсутствует переменная: ?array=</p>';
            }
        ?>
    </div>
</body>
</html>