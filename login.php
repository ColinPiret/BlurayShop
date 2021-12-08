<?php
// Création de la session
session_start();
require_once 'functions/db.php';
$dbh = connect();
$sql = "SELECT * 
FROM bluray.user
WHERE login = :login";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

if($user) {

    if (password_verify($_POST['password'], $user->password) && $user->level == "admin") {

        $_SESSION['login'] = $user->first_name .' '.$user->last_name;
        $_SESSION['admin'] = $user->id;
        header('location:admin.php');
    }


    elseif (password_verify($_POST['password'], $user->password) && $user->level == "user") {

        $_SESSION['login'] = $user->first_name .' '.$user->last_name;
     $_SESSION['user'] = $user->id;
        header('location:index.php');
    }

    elseif (!password_verify($_POST['password'], $user->password)){

        echo "Login ou mot de passe incorrect";
        header('location:login.html');
    }


}




