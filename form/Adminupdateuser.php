<?php
// Requête et traitement pour l'enregistrement à modifier
session_start();
if(!$_SESSION['login']) header('location:index.php');
require_once '../functions/db.php';
$dbh = connect();

$sql = "
SELECT *
FROM bluray.user
WHERE user.id = :userid ";

$stmt = $dbh->prepare($sql);
$stmt->bindValue('userid', $_GET['userid'], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();

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

        <h3>Modifier utilisateur</h3>

        <form action="../src/Admin_updateuser.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value=<?= $user->first_name ?> >
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value=<?= $user->last_name ?> >
            </div>

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login" value=<?= $user->login ?> >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value=<?= $user->password ?> >
            </div>

            <div class="form-group">
                <label for="level" class="form-label">Level</label>
                <select  name="level" id="level" class="form-control" required>
                    <option value="<?= $user->level ?>"><?= $user->level ?></option>

                    <option value="user">User</option>
                    <option value="admin">Admin</option>

                </select>
            </div>

            <input type="hidden" value="<?=$user->id ?>" name="userid">

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">Modifier</button>
            </div>
        </form>
        <a class="nav-link active link-dark" aria-current="page" href="../tableuser.php">Annuler</a>
    </div>

</div>



</body>
</html>
