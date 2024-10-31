<?php

require __DIR__ . '/inc/all.inc.php';

$top_names = fetch_top_names();


render('index.view', [
    'top_names' => $top_names,
]);

