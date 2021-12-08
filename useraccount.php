<?php

if(isset($_SESSION['admin'])){
    require_once 'partials/headerAdmin.php';
}
elseif (isset($_SESSION['user'])){
    require_once 'partials/header.php';
}

$dbh = connect();

$sql = "SELECT user.first_name, user.last_name, user.password, user.level FROM bluray.user WHERE user.id = :id";

$stmt = $dbh->prepare($sql);

$stmt->bindValue('id',$_GET['id'],PDO::PARAM_INT);


$stmt->execute();
$user = $stmt->fetch();



?>

<main class="container">

    <div class="row py-5">

                <div class="card shadow  col-sm-4 col-md-3 my-3 my-md-2 text-center">


                    <img src="img/userpdp/iconuser.png" alt="<?= $user->first_name?> <?= $user->last_name?>" class="card-img-top ">


                    <div class="card-body">

                        <h5 class="card-title"><?= $user->first_name?> <?= $user->last_name?></h5>

                    </div>

                    <?php if(isset($_SESSION["admin"])): ?>
                    <div>
                        <a href="form/updateuser.php?userid=<?= $user->$_SESSION["admin"]?>" class="btn btn-info text-light">Mes données </i></a>
                    </div>

                    <?php elseif(isset($_SESSION["user"])): ?>
                    <div>
                        <a href="form/updateuser.php?userid=<?= $user->$_SESSION["user"]?>" class="btn btn-info text-light">Mes données </i></a>
                    </div>

                    <?php endif;?>
                    <div>
                        <a href="panier.php" class="btn btn-warning my-3">Panier</i></a>
                    </div>


                </div>


    </div>



</main>




<?php require_once "partials/footer.php";  ?>


