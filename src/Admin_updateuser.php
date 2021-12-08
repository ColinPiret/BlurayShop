<?php
// var_dump($_POST['id']);
require_once '../functions/db.php';
$dbh = connect();
$sql = "UPDATE bluray.user SET first_name = :prenom, last_name = :nom,  login = :login,  password = :password, level = :level WHERE user.id = :userid";
$stmt = $dbh->prepare($sql);
// pas oublier d'associer l'id
$stmt->bindValue('userid', $_POST['userid'], PDO::PARAM_INT);
$stmt->bindValue('prenom', $_POST['prenom'], PDO::PARAM_STR);
$stmt->bindValue('nom', $_POST['nom'], PDO::PARAM_STR);
$stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
$stmt->bindValue('password', $_POST['password'], PDO::PARAM_STR);
$stmt->bindValue('level', $_POST['level'], PDO::PARAM_STR);


$stmt->execute();

header('location:../tableuser.php');
