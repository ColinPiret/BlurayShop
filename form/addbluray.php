<?php

session_start();
if(!isset($_SESSION['admin'])){
    header('location:index.php');

}
require_once '../functions/db.php';
$dbh = connect();

$sql = "SELECT *
        FROM bluray.category
        ORDER BY name";

$stmt = $dbh->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

?>
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Addbluray</title>
    <link rel="stylesheet" href="../css/minireset.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="col-md-8 offset-md-2">

        <h3>Ajouter un nouveau bluray</h3>

        <form action="../src/addbluray.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titre du bluray</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titre" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix" required>
            </div>
            <div class="form-group">
                <label for="date">Date de publication</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" class="form-control" id="note" name="note" min="0" max="5" placeholder="Note" required>
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Catégorie</label>
                <select  name="category" id="category" class="form-control" required>
                    <option value="">Catégorie </option>

                    <?php foreach ($categories as $category): ?>

                        <option value="<?=$category->id?>"><?=$category->name?></option>

                    <?php endforeach; ?>

                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Description du livre"></textarea>
            </div>

    <div class="form-group">
                <label for="cover">Cover</label>
                <input type="file" class="form-control" name="cover" id="cover" placeholder="cover">
            </div>

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">Ajouter</button>
            </div>
        </form>
        <a class="nav-link active link-dark" aria-current="page" href="../admin.php">Annuler</a>
    </div>

</div>



</body>
</html>