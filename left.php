<?php
$board = &$_SESSION['board'];
for ($i = 0; $i < 4; $i++) {
    $board[$i] = mergeRow(array_filter($board[$i]));
    while (count($board[$i]) < 4) {
        $board[$i][] = 0;
    }
}
$_SESSION['board'] = $board;
