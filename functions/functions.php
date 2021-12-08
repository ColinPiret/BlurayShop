<?php

// Création du système de notation
function stars(int $eval): void {
    for($i = 1; $i <= $eval; $i++) {
        echo '<i class="icofont-star yellowStar"></i>';
    }
    // echo $i;
    for(; $i <= 5; $i++) {
        echo '<i class="icofont-star blackStar"></i>';
    }
}

// Création du fonction de dump
function dump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}