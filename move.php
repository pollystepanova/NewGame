<?php
//берет массив чисел (представляющий одну строку игрового поля) 
//и объединяет одинаковые числа, которые находятся рядом
function mergeRow($row) {
    $merged = [];
    while (count($row) > 0) {
        $current = array_shift($row);
        if (!empty($row) && $row[0] === $current) {
            array_shift($row);
            $merged[] = $current * 2;
        } else {
            $merged[] = $current;
        }
    }
    return $merged;
}
//меняет строки и столбцы местами, то есть превращает строки в столбцы и наоборот
function transpose($board) {
    $transposed = [];
    for ($i = 0; $i < 4; $i++) {
        $transposed[$i] = array_column($board, $i);
    }
    return $transposed;
}

//определяет, закончилась ли игра
function isGameOver() {
    $board = $_SESSION['board'];

    foreach ($board as $row) {
        if (in_array(0, $row, true)) {
            return false;
        }
    }

    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($board[$i][$j] === $board[$i][$j + 1]) {
                return false;
            }
        }
    }

    for ($j = 0; $j < 4; $j++) {
        for ($i = 0; $i < 3; $i++) {
            if ($board[$i][$j] === $board[$i + 1][$j]) {
                return false;
            }
        }
    }

    return true;
}

//добавляет на игровое поле в случайную яйчейку значение 2 или 4 
function addRandomTile() {
    $board = &$_SESSION['board'];
    addRandomTileToBoard($board);
}
