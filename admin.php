
<?php
session_start();

if(!isset($_SESSION['admin'])){
    header('location:index.php');
}
else{
    require_once 'partials/headerAdmin.php';
}


$dbh = connect();

if (!isset($_GET['cat'])){


    $sql = "SELECT bluray.name, price, release_date, bluray.note, cover, bluray.description,category.id, bluray.id 
        FROM bluray
        LEFT JOIN bluray.category 
        ON bluray.cat_id = category.id 
        ORDER BY bluray.name";

    $stmt = $dbh->prepare($sql);

}

else{

    $sql = "SELECT bluray.name, price, release_date, bluray.note, cover, bluray.description, category.id, bluray.id 
            FROM bluray 
            LEFT JOIN bluray.category 
            ON bluray.cat_id = category.id
            WHERE bluray.cat_id = :cat
            ORDER BY bluray.name";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('cat',$_GET['cat'],PDO::PARAM_INT);

}

//Filtres


if(isset($_GET['filtre']) ){

    if ($_GET['filtre'] == "note"){
        $sql = "SELECT bluray.name, price, release_date, bluray.note, cover, bluray.description, category.id, bluray.id 
            FROM bluray 
            LEFT JOIN bluray.category 
            ON bluray.cat_id = category.id
            ORDER BY bluray.note DESC
           " ;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_INT);
    }

    elseif ($_GET['filtre'] == "prixcroissant"){
        $sql = "SELECT bluray.name, bluray.price, release_date, bluray.note, cover, bluray.description, category.id, bluray.id 
            FROM bluray 
            LEFT JOIN bluray.category 
            ON bluray.cat_id = category.id
            ORDER BY bluray.price ASC ";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_INT);
    }
    elseif ($_GET['filtre'] == "decroissant"){
        $sql = "SELECT bluray.name, bluray.price, release_date, bluray.note, cover, bluray.description, category.id, bluray.id 
            FROM bluray 
            LEFT JOIN bluray.category 
            ON bluray.cat_id = category.id
            ORDER BY bluray.price DESC ";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_INT);
    }
    elseif ($_GET['filtre'] == "date"){
        $sql = "SELECT bluray.name, bluray.price, bluray.release_date, bluray.note, cover, bluray.description, category.id, bluray.id 
            FROM bluray 
            LEFT JOIN bluray.category 
            ON bluray.cat_id = category.id
            ORDER BY bluray.release_date ASC ";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_STR);
    }
}
//////////


if (isset($_POST['search']) AND !empty($_POST['search'])){



    $search = htmlspecialchars($_POST['search']);

    $sql = "SELECT bluray.name, price, release_date, bluray.note, cover, bluray.description,category.id, bluray.id
        FROM bluray
        LEFT JOIN bluray.category 
        ON bluray.cat_id = category.id 
        WHERE bluray.name LIKE '%$search%'  
        ORDER BY bluray.name ";


    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('search','%'.$_POST['search'].'%',PDO::PARAM_STR);


}

$stmt->execute();

$count=$stmt->rowCount();

$blurays = $stmt->fetchAll();

$cat = isset($_GET['cat']) ? 'Catégorie '.$_GET['catname'] : 'Toutes les catégories';



if (isset($_POST['search']) AND !empty($_POST['search'])) {

    if ($count==0)
    {

        echo "<h5>Aucun résultat pour: <i>$search</i></h5>";

    }
    elseif($count>1){

        echo " <h5>$count Résultats pour <i>$search</i> </h5>";
    }
    else{

        echo " <h5>$count Résultat pour <i>$search</i> </h5>";
    }

}



?>

<!-- Bluray card loop-->

<main class="container">

    <div class="row py-5">





        <?php foreach ($blurays as $bluray): ?>


    <div class="card shadow  col-sm-4 col-md-3 my-3 my-md-2 text-center">


          <img src="img/covers/<?= $bluray->cover?>" alt="<?= $bluray->name?>" class="card-img-top">

        <div class="card-body">

            <h5 class="card-title"><?= $bluray->name?></h5>
            <p><?= $bluray->price?>€</p>
            <p><?= stars($bluray->note)  ?></p>
            <a href="detail.php?id=<?=$bluray->id?>" class="btn btn-outline-dark">detail</a>
            <?php  if(isset($_SESSION['login'])): ?>

             <!--    <form method="post" action="panierbackup.php">
                    <label for="quantity">Nbre</label>
                    <input type="number" name="quantity">
                    <button type="submit" name="addToCart"  disabled  class="btn btn-warning my-3">Add to cart<i class="icofont-shopping-cart"></i></button>
                </form>
                -->
                <a  href="src/addtocart.php?id=<?=$bluray->id?> class="btn btn-warning my-3">Add to cart</a>
            <?php endif; ?>
            <div>
                <a href="form/updatebluray.php?idbluray=<?= $bluray->id?>" class="text-dark"><i class="icofont-pencil-alt-2 update"></i></a>
               <a  href="src/delbluray.php?id=<?= $bluray->id?>" onclick="return confirm('Are you sure?')" class="text-danger"><i class="icofont-trash delete"></i></a>
            </div>

        </div>

    </div>

 <?php endforeach; ?>



    </div>


</main>






<?php require_once "partials/footer.php";  ?>