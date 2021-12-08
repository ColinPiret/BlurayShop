<?php
session_start();

require_once '../functions/db.php';
require_once '../functions/functions.php';
if(isset($_SESSION['login'])){

    require_once '../functions/panier.class.php';
    $panier = new panier();
}

if(isset($_GET['id'])){

    $dbh = connect();
    $sql = "SELECT bluray.name,bluray.id, price, release_date, bluray.note, cover, bluray.description, category.name AS catname
            FROM bluray 
            LEFT JOIN bluray.category 
            ON bluray.cat_id = category.id
            WHERE bluray.id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('id',$_GET['id'],PDO::PARAM_INT);
    $stmt->execute();
    $bluray = $stmt->fetch();

    if (empty($bluray)){

        die("Ce produit n'existe pas");
    }

    $panier->add($bluray->id);
  // die("<h5> Le produit à bien été ajouté à votre panier <a href='../index.php'> Retour au catalogue </a></h5>");


    if (isset($_SESSION['admin'])){

        header('location:../admin.php');
    }
    else{
        header('location:../index.php');
    }



}
else{

    die("Vous n'avez pas selectionné de produit à ajouter au panier");
}
