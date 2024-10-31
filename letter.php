<?php

require __DIR__ . '/inc/all.inc.php';

$letter = null;
if (!empty($_GET['letter'])) {
    $letter = strtoupper($_GET['letter']);

    if (strlen($letter > 1)) {
        $letter = $letter[0];
    }
}

if (strlen($letter) === 0) {
    header('Location: index.php');
}


$names = [];
if (!empty($letter)) {
    $names =  fetch_names_initial($letter);
}


render('letter.view', [
    'names' => $names,
    'letter' => $letter
]);
