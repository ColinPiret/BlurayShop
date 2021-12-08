
<?php
session_start();
if(!$_SESSION['login']) header('location:index.php');

require_once '../functions/db.php';

$dbh = connect();
$sql = "INSERT INTO bluray ( name, price, release_date, note, cat_id, description, cover)
        VALUES (:title, :prix, :date, :note, :category, :description, :cover) ";

$stmt = $dbh->prepare($sql);
$stmt->bindValue('title', $_POST['title'], PDO::PARAM_STR);
$stmt->bindValue('prix', $_POST['prix'], PDO::PARAM_INT);
$stmt->bindValue('date', $_POST['date'], PDO::PARAM_STR);
$stmt->bindValue('note', $_POST['note'], PDO::PARAM_INT);
$stmt->bindValue('category', $_POST['category'], PDO::PARAM_INT);
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