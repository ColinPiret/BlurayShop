
<?php

session_start();
require_once 'functions/db.php';
require_once 'functions/functions.php';
require_once 'functions/panier.class.php';
$panier = new panier();

$dbh = connect();
$sql = "SELECT * 
        FROM bluray.category
        ORDER BY name";

$stmt = $dbh->prepare($sql);
$stmt->execute();

$categories = $stmt->fetchAll();

////////////

$sql = "SELECT user.id, user.first_name, user.last_name FROM bluray.user";

$stmt = $dbh->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();


?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/minireset.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- icofont-->
    <link rel="stylesheet" href="css/icofont.min.css">

    <title> Blurayshop</title>

</head>
<body>


<header>

    <!-- navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><span class="h4 text-info">Bluray</span><span class="h6">Shop</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="icofont-home"></i></a>
                    </li>

                    <!-- Categories !-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cat??gories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li> <a class="dropdown-item" href="index.php">Toutes les categories</a> </li>

                            <?php foreach ($categories as $category): ?>


                            <li> <a class="dropdown-item" href="?cat=<?=$category->id?> &catname=<?= $category->name?>"><?= $category->name ?></a> </li>

                            <?php endforeach; ?>


                        </ul>

                    </li>


                    <!-- Filtres !-->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filtres blurays
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


                            <li> <a class="dropdown-item" href="?filtre=note">Mieux Not??s</a></li>

                            <li>
                                <a class="dropdown-item" href="?filtre=prixcroissant">Prix croissant </a>
                                <a class="dropdown-item" href="?filtre=decroissant">Prix d??croissant </a>

                            </li>
                            <li> <a class="dropdown-item" href="?filtre=date">Date</a></li>


                        </ul>

                    </li>

                </ul>


                <!-- Search !-->
                <form method="POST" class="d-flex" >
                    <input class="" type="search" name="search" <?php if(isset($_POST['search']) AND !empty($_POST['search']) ): ?> placeholder="<?=$_POST['search']?>" <?php else: ?> placeholder="Search" <?php endif; ?> aria-label="Search">
                    <button class="text-info" type="submit"><i class="icofont-search"></i></button>
                </form>





                <?php  if(!isset($_SESSION['login']) ):?>

                <a class="btn btn-info" href="form/signin.html" role="button">SignIn</a>

                    <a class="btn btn-info" href="login.html" role="button">Login</a>
                <?php  elseif(isset($_SESSION['login'])): ?>


                    <a class="nav-link text-light active" href="panier.php" class="text-light"><i class="icofont-shopping-cart"></i> <?php if($panier->count()==0){echo "0";} else{echo$panier->count();}  ?></a>

                    <i class="icofont-user-alt-3 text-light"></i>
                    <a class="nav-link text-light active" href="useraccount.php?id=<?=$_SESSION["user"]?>">   <h6 class="text-light"> <span class="text-secondary">compte</span> <?php echo $_SESSION["login"] ?></h6> </a>

                    <a class="btn btn-danger" href="src/logout.php" role="button">Logout</a>

             <?php endif; ?>









            </div>
        </div>
    </nav>

</header>

