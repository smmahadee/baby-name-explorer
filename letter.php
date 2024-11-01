<?php

require __DIR__ . '/inc/all.inc.php';

$letter = null;
if (!empty($_GET['letter'])) {
    $letter = strtoupper($_GET['letter']);

    if (strlen($letter > 1)) {
        $letter = $letter[0];
    }
}

$alphabets = gen_alphabet();

if (strlen($letter) === 0 || !in_array($letter, $alphabets)) {
    header('Location: index.php');
}

// PAGINATION
$page = 1;
if (!empty($_GET['page'])) {
    $page = (int)$_GET['page'];
}

$perPage = 15;
$offset = ($page - 1) * $perPage;
$totalNames =  count_names_initial($letter) ;
$totalPages = (int)ceil($totalNames / $perPage);


$names = [];
if (!empty($letter)) {
    $names =  fetch_names_initial($letter, $offset, $perPage);
}


render('letter.view', [
    'names' => $names,
    'letter' => $letter,
    'totalPages' => $totalPages,
    'page' => $page,
]);
