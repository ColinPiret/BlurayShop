<?php
session_start();


if(!isset($_SESSION['login'])){
    header('location:index.php');
}

    require_once 'partials/headerAdmin.php';


$dbh = connect();

$sql = "SELECT user.id, user.first_name, user.last_name, user.level FROM bluray.user ORDER BY user.last_name";

$stmt = $dbh->prepare($sql);

//Filtres

if(isset($_GET['filtre']) ){

    if ($_GET['filtre'] == "nom"){
        $sql = "SELECT user.first_name, user.last_name, user.level FROM bluray.user ORDER BY user.last_name
           " ;
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_INT);
    }

    elseif ($_GET['filtre'] == "user"){
        $sql = "SELECT user.first_name, user.last_name, user.level FROM bluray.user WHERE user.level = 'user' ORDER BY user.last_name";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_STR);
    }

    elseif ($_GET['filtre'] == "admin"){
        $sql = "SELECT user.first_name, user.last_name, user.level FROM bluray.user WHERE user.level = 'admin' ORDER BY user.last_name";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue('filtre',$_GET['filtre'],PDO::PARAM_STR);
    }

}
//////////



if (isset($_POST['search']) AND !empty($_POST['search'])){



//////////////////////


    $search = preg_replace('`( | |&nbsp;)+`i', '', htmlspecialchars($_POST['search']));
    $sql = "SELECT user.id, user.first_name, user.last_name 
        FROM bluray.user 
        WHERE CONCAT(last_name,first_name)  LIKE '%$search%' OR CONCAT(first_name,last_name)  LIKE '%$search%'
        
        ORDER BY user.last_name";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('search','%'.$_POST['search'].'%',PDO::PARAM_STR);


}

$stmt->execute();

$count=$stmt->rowCount();

$users = $stmt->fetchAll();


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
<!-- user card loop-->

<main class="container">

    <div class="row py-5">

        <?php if ($users):   ?>

            <?php foreach ($users as $user): ?>


                <div class="card shadow  col-sm-4 col-md-3 my-3 my-md-2 text-center">


                    <img src="img/userpdp/iconuser.png" alt="<?= $user->first_name?> <?= $user->last_name?>" class="card-img-top ">


                    <div class="card-body">

                            <h5 class="card-title"><?= $user->first_name?> <?= $user->last_name?></h5>

                    </div>
                    <div>
                        <a href="form/Adminupdateuser.php?userid=<?= $user->id?>" class="text-dark"><i class="icofont-pencil-alt-2 update"></i></a>
                        <a  href="src/deluser.php?userid=<?= $user->id?>" onclick="return confirm('Are you sure?')" class="text-danger"><i class="icofont-trash delete"></i></a>
                    </div>

                </div>

            <?php endforeach; ?>


        <?php elseif(!isset($_POST['search'])) : ?>


            <h5> Aucun resultat pour cette catégorie</h5>

        <?php endif; ?>


    </div>


</main>




<?php require_once "partials/footer.php";  ?>

