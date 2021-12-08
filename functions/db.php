<?php
// Création de la fonction de connexion
function connect(): object
{
    $dsn = 'mysql:host=localhost; dbname=bluray; charset=utf8';
    $user = 'root';
    $password = '';
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
        $dbh = new PDO($dsn, $user, $password, $options);
    }
    catch(Exception $exception) {
        die('Erreur de connexion: '.$exception->getMessage());
    }
    return $dbh;
}
