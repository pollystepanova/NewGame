<?php
//заполнение яйчейки поля рандомным значением
// либо 2 (с вероятностью 90%), либо 4 (с вероятностью 10%)
function addRandomTileToBoard(&$board) {
    $emptyCells = [];
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($board[$i][$j] === 0) {
                $emptyCells[] = [$i, $j];
            }
        }
    }
    if (!empty($emptyCells)) {
        $randomCell = $emptyCells[array_rand($emptyCells)];
        $board[$randomCell[0]][$randomCell[1]] = rand(1, 10) === 1 ? 4 : 2;
    }
}
//создание игрового поля с помощью двухмерного массива и заполнение массива двумя значениями
function initializeBoard() {
    $board = array_fill(0, 4, array_fill(0, 4, 0));
    addRandomTileToBoard($board);
    addRandomTileToBoard($board);
    return $board;
}

//отвечает за отображение игрового поля в виде HTML-таблицы, используется функция в game.html
function printBoard($board) {
    echo '<table border="0" cellpadding="40" style="margin: 0 auto; font-size: 20px; text-align: center; background-color: #333; color: #ffffff; width="100"; height: 100; cellpadding="0"; cellspacing="0";">';
    foreach ($board as $row) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td style="border: 5px solid #444; width: 20px; height: 20px;">' . ($cell ?: '') . '</td>';
        }
        echo '</tr style="width: 20px; height: 20px;">';
    }
    echo '</table>';
}
