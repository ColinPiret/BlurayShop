<?php

session_start();
if(!$_SESSION['login']) header('location:index.php');

require_once '../functions/db.php';
$dbh = connect();

$sql = "
DELETE 
FROM bluray 
WHERE id= :id ";

$stmt = $dbh->prepare($sql);


$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);

$stmt->execute();

header('location:../admin.php');