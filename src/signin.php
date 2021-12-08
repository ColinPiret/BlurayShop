<?php
require_once '../functions/db.php';
$dbh = connect();
$sql = "INSERT INTO user (first_name, last_name, login, password, nom_prenom) 
        VALUES (:prenom, :nom, :login, :password, :nom_prenom)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('prenom', $_POST['prenom'], PDO::PARAM_STR);
$stmt->bindValue('nom', $_POST['nom'], PDO::PARAM_STR);
$stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
$stmt->bindValue('password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
$stmt->bindValue('nom_prenom', $_POST['nom_prenom'],PDO::PARAM_STR);
$stmt->execute();
header('location: ../index.php');


