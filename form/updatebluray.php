<?php

session_start();
if(!isset($_SESSION['admin'])){

    header('location:index.php');
}
require_once '../functions/db.php';

$dbh = connect();


$sql = "    SELECT bluray.id, bluray.name AS titre, price, release_date, note, cover, description, bluray.cat_id, category.name AS catid FROM bluray
            LEFT JOIN bluray.category
            ON bluray.cat_id = category.id
            WHERE bluray.id = :idbluray";

$stmt = $dbh->prepare($sql);
$stmt->bindValue('idbluray',$_GET['idbluray'],PDO::PARAM_INT);
$stmt->execute();
$bluray = $stmt->fetch();



///////////////

$sql = "SELECT category.name AS catname, category.id AS catid
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
    <title>Updatebluray</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="col-md-8 offset-md-2">

        <h3>Editer bluray</h3>

        <form action="../src/updatebluray.php" method="post">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="name" name="titre" value=<?= $bluray->titre?>  >
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix" value=<?= $bluray->price?>>
            </div>
            <div class="form-group">
                <label for="date">Date de publication</label>
                <input type="date" class="form-control" id="date" name="date" value=<?= $bluray->release_date?>>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" class="form-control" id="note" name="note" min="0" max="5" placeholder="Note" value=<?=$bluray->note ?> >
            </div>

            <div class="form-group">
                <label for="category" class="form-label"> Catégorie </label>
                <select  name="catid" id="catid" class="form-control">

                    <option value="<?=$bluray->cat_id?>"> <?= $bluray->catid?> </option>
                    <?php foreach ($categories as $category): ?>

                        <option value="<?=$category->catid?>" > <?=$category->catname?></option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Description du livre"><?= $bluray->description?></textarea>
            </div>

            <div class="form-group">
                <label for="cover">Cover</label>
                <input type="file" class="form-control" name="cover" id="cover" placeholder="cover" value=<?= $bluray->cover?>>
            </div>


            <input type="hidden" value="<?=$bluray->id ?>" name="idbluray">

            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary" value="Modifier">Modifier</button>
            </div>

        </form>
        <a class="nav-link active link-dark" aria-current="page" href="../admin.php">Annuler</a>
    </div>
</div>

</body>
</html>