<?php

session_start();
if(!$_SESSION['login']) header('location:index.php');

require_once '../functions/db.php';
$dbh = connect();

$sql = "
DELETE 
FROM bluray.user 
WHERE id= :userid ";

$stmt = $dbh->prepare($sql);

$stmt->bindValue('userid', $_GET['userid'], PDO::PARAM_INT);

$stmt->execute();

header('location: ../tableuser.php');