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
    <div class="draw">
        <?php
            function figur($num){
                $shape = ($num >> 5) & 3; // 00-круг 01-прямоуг 10-квадр 11-треуг
                $red = ($num >> 4) & 1;
                $green = ($num >> 3) & 1; // RGB
                $blue = ($num >> 2) & 1;
                $size = (($num >> 0) & 3) + 1; // 00-мал 01-сред 10-бол 11-очбол
                // HEX цвет
                $color = '"#'
                . ($red == 1 ? 'ff' : "00")
                . ($green == 1 ? 'ff' : "00")
                . ($blue == 1 ? 'ff' : "00") . '"';
                // Увеличение размера
                $size = $size * 100;
                $shape_tag = '';

                switch ($shape) {
                    case 0: // Круг
                        $radius = ($size / 2);
                        $shape_tag = "circle "
                        . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                        . " r=" . $radius . " ";
                        break;
                    case 1: // Прямоугольник
                        $shape_tag = "rect "
                        . "width=" . ($size * 2) . " height=" . ($size);
                        break;
                    case 2: // Квадрат
                        $shape_tag = "rect "
                        . "width=" . ($size) . " height=" . ($size);
                        break;
                    case 3: // Треугольник
                        $side = $size;
                        $shape_tag = "polygon points='"
                        . ($side / 2 + 5) . ",10"
                        . " 10," . ($side) . " "
                        . ($side) . "," . ($side) . "'";
                        break;
                }
                echo '<svg>';
                echo '<' . $shape_tag . ' fill=' . $color . ' />';
                echo '</svg>';
            }


            if (isset($_GET['num']) && is_numeric($_GET['num'])) {
                $num = $_GET['num']; // Получение переменной
                echo 'Число: ' . $num . ' Двоичный вид: '
                . sprintf("%07d", decbin(strval($num))) . '<br>';
                // 00 0 0 0 00
                // Shape R G B Size
                figur($num);
            }else{
                !(isset($_GET['num'])? print('<p>Ввод некорректен, введите числа</p>'): print('<p>Отсутствует переменная: ?num=</p>'));
            }
        ?>
    </div>
</body>
</html>