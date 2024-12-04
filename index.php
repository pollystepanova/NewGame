<?php
session_start();

// Подключаем файлы
require_once 'gameboard.php';
require_once 'move.php';


// Инициализация доски, если она не существует
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = initializeBoard();
}

// Если нажата кнопка "Начать заново"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'restart') {
    unset($_SESSION['board']); // Сбрасываем игровую доску
    header("Location: index.php"); // Перенаправляем пользователя на ту же страницу
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case 'up':
            require 'up.php';
            break;
        case 'down':
            require 'down.php';
            break;
        case 'left':
            require 'left.php';
            break;
        case 'right':
            require 'right.php';
            break;
    }

    //добавляет на игровое поле в случайную яйчейку значение 2 или 4
    addRandomTile();
    //проверка окончена ли игра
    if (isGameOver()) {
        echo "<h1>Игра окончена.</h1>";
        unset($_SESSION['board']); // Сбрасываем доску
        exit;
    }
    
}

require 'game.html';
