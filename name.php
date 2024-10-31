<?php

require __DIR__ . '/inc/all.inc.php';

$name = null;
if(!empty($_GET['name'])) {
    $name = $_GET['name'];
}

if(empty($name)) {
    header('Location: index.php');
    exit;  
}

$specificName = fetch_by_name($name);


render('name.view', [
    'name' => $name,
    'letter' => $name[0],
    'specificName' => $specificName
]);