<?php
function moveUp(&$board) {
    $transposed = transpose($board);
    for ($i = 0; $i < 4; $i++) {
        $transposed[$i] = mergeRow(array_filter($transposed[$i])); 
        while (count($transposed[$i]) < 4) {
            $transposed[$i][] = 0; 
        }
    }
    $board = transpose($transposed);
}
$board = $_SESSION['board'];
moveUp($board);
$_SESSION['board'] = $board;