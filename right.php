<?php
$board = &$_SESSION['board'];
for ($i = 0; $i < 4; $i++) {
    $board[$i] = array_reverse(mergeRow(array_filter(array_reverse($board[$i]))));
    while (count($board[$i]) < 4) {
        array_unshift($board[$i], 0);
    }
}
