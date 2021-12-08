<?php

session_start();
if(!$_SESSION['login']) header('location:index.php');
require 'partials/header_admin.php';
require 'functions/db.php';
require 'functions/functions.php';
$dbh = connect();

if(isset($_GET['action'])) {
    if($_GET['action'] == 'addsite') {
        require 'forms/addsite.php';
    } elseif($_GET['action'] == 'editsite') {
        require 'forms/editsite.php';
    } elseif($_GET['action'] == 'adduser') {
        require 'forms/adduser.php';
    }
} else {
    require 'partials/admin_table.php';
}

require 'partials/footer.php';
