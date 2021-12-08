<?php

class panier{

function construct(){

    if(!isset($_SESSION)){session_start();}

    if(!isset($_SESSION['panier'])){$_SESSION['panier'] = array();}


}

function del($bluray_id){

    $dbh = connect();

    unset($_SESSION['panier'][$bluray_id]);

    }

function add($bluray_id){

    if (isset($_SESSION['panier'][$bluray_id])){
        $_SESSION['panier'][$bluray_id]++;
    }
    else{
        $_SESSION['panier'][$bluray_id]= 1;
    }


}


function count(){

    if (isset($_SESSION['panier'])){


    if( array_sum($_SESSION['panier']) !=NULL){
  return array_sum($_SESSION['panier']);
    }
    else{
        echo"<span>0</span>";
    }
}


}

function total(){
    if (isset($_SESSION['panier'])){
    $total = 0;
    $ids = implode(array_keys($_SESSION['panier']));

    if (empty($ids)){
        $blurays=array();
    }
    else{
        $dbh = connect();
        $sql = " SELECT bluray.id, price FROM bluray WHERE bluray.id IN ($ids) ";

        $stmt = $dbh->prepare($sql);
        //$stmt->bindValue('id',$_GET['id'],PDO::PARAM_INT);
        $stmt->execute();
        $blurays = $stmt->fetchall();
         }

    foreach ($blurays as $bluray  ){

$total += $bluray->price * $_SESSION['panier'][$bluray->id] ;

    }

    return $total;
}

}





}

