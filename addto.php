<?php
    session_start();
    $id = $_GET['id'];
    $qty = $_POST['qty'];
    echo $id;
    echo $qty;
    echo print_r($_SESSION['cart']);
    echo print_r($_SESSION['qty1']);
    // echo $qty;
    if(!in_array($id,$_SESSION['cart'])){
        array_push($_SESSION['cart'],$id);
        if($qty < 1){
            array_push($_SESSION['qty1'],1);
        }
        else{
            array_push($_SESSION['qty1'],$qty);
        }
    }
    else{
        $key = array_search($id,$_SESSION['cart']);
        if($qty != 0){
            $_SESSION['qty1'][$key] = $qty;
        }
        else{
            $q = $_SESSION['qty1'][$key];
            $_SESSION['qty1'][$key] = ++$q;
        }
    }
    
    echo print_r($_SESSION['cart']);
    echo print_r($_SESSION['qty1']);
    header("location:shop.php");