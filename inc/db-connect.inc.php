<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'names', 'ileG(uXPnLpX/!y8', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
       // var_dump($e->getMessage());
    echo 'A problem occurred with the database connection...';
    die();
}