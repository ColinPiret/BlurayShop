<?php

session_start();
if(!$_SESSION['login']) header('location:index.php');
require_once '../functions/db.php';
$dbh = connect();

$sql = "SELECT user.id, user.first_name, user.last_name FROM bluray.user ORDER BY user.last_name";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

?>
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>AddUser</title>
    <link rel="stylesheet" href="../css/minireset.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="col-md-8 offset-md-2">


        <h3>Ajouter un nouvel utilisateur</h3>

        <form action="../src/adduser.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="level" class="form-label">Level</label>
                <select  name="level" id="level" class="form-control" required>
                    <option value="">Sélectionnez niveau</option>

                        <option value="user">User</option>
                        <option value="admin">Admin</option>

                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">Ajouter</button>
            </div>

        </form>
        <a class="nav-link active link-dark" aria-current="page" href="../tableuser.php">Annuler</a>
    </div>

</div>



</body>
</html>