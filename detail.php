<?php

if(isset($_SESSION['admin'])){
    require_once 'partials/headerAdmin.php';
}
else{
    require_once 'partials/header.php';
}


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


$sql = "SELECT level
            FROM bluray.user
           ";

$stmt = $dbh->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();


?>



<main class="container">

    <div class="row py-5 ">

    <div class="card shadow  col-sm-12  my-3 my-md-2 text-center">

       <div class="">
           <img src="img/covers/<?= $bluray->cover?>" alt="<?= $bluray->name?>" class="card-img-top">

        <div class="card-body">


            <h5 class="card-title"><?= $bluray->name?> <span class="text-secondary"><?= $bluray->catname?></span></h5>
            <p>(<?= $bluray->release_date?>)</p>
            <p><?= $bluray->price?>€</p>
            <p><?= stars($bluray->note)  ?></p>

            <?php if(isset($_SESSION['login'])): ?>
          <!--   <button type="submit" name="addToCart"  class="btn btn-warning my-3">Add to cart<i class="icofont-shopping-cart"></i></button> -->
                <a href="src/addtocart.php?id=<?=$bluray->id?> class="btn btn-warning my-3">Add to cart</a>
            <?php endif; ?>

            <p class="px-10"><?= $bluray->description?></p>





  <?php if(isset($_SESSION['admin'])):  ?>
            <a class="btn btn-outline-dark" aria-current="page" href="admin.php"> Retour </a>

            <?php else: ?>
      <a class="btn btn-outline-dark" aria-current="page" href="index.php"> Retour </a>
            <?php endif; ?>


        </div>

    </div>

    </div>

    </div>

</main>




<?php require_once "partials/footer.php"; ?>