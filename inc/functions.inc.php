<?php

function e($value) {
    return htmlspecialchars($value, ENT_NOQUOTES, 'UTF-8');
}