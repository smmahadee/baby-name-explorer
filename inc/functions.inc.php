<?php

function e($value) {
    return htmlspecialchars($value, ENT_NOQUOTES, 'UTF-8');
}

function render($view, $params) {
    extract($params);

    ob_start();
    require __DIR__. '/../views/pages/' . $view . '.php';
    $contents = ob_get_clean();

    $alphabets = gen_alphabet();
    require __DIR__. '/../views/layout/main.view.php';
}


// generate a to z alphabetic characters
function gen_alphabet() {
    $A = ord('A');
    $Z = ord('Z');

    $letters = [];

    for ($i = $A; $i <= $Z; $i++) {
        $letters[] =  chr($i);
    }

    return $letters;
}

