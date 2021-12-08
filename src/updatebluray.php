<?php

require_once '../functions/db.php';

$dbh = connect();
$sql = "UPDATE bluray 
SET name = :titre, price = :prix, release_date = :date, note = :note, cat_id = :catid, description = :description, cover = :cover 
WHERE id = :idbluray";

$stmt = $dbh->prepare($sql);

$stmt->bindValue('idbluray', $_POST['idbluray'], PDO::PARAM_INT);
$stmt->bindValue('titre', $_POST['titre'], PDO::PARAM_STR);
$stmt->bindValue('prix', $_POST['prix'], PDO::PARAM_INT);
$stmt->bindValue('date', $_POST['date'], PDO::PARAM_STR);
$stmt->bindValue('note', $_POST['note'], PDO::PARAM_INT);
$stmt->bindValue('catid', $_POST['catid'], PDO::PARAM_INT);
$stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
$stmt->bindValue('cover', !empty($_FILES['cover']['name']) ? $_FILES['cover']['name'] : "default.png", PDO::PARAM_STR);

$stmt->execute();


if (!empty($_FILES['cover']['name'])){

    if (move_uploaded_file($_FILES['cover']['name'], '../img/covers/'.$_FILES['cover']['name'].'')){
        header('location:../admin.php');
    }
    else{
        header('location:../admin.php');
    }

}
header('location:../admin.php');