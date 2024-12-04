<?php
$board = &$_SESSION['board'];
$board = transpose($board);
require 'right.php';
$board = transpose($board);
