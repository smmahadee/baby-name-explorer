<?php

function e($value) {
    return htmlspecialchars($value, ENT_NOQUOTES, 'UTF-8');
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

