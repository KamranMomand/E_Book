<?php
    session_start();
    $id = $_GET['id'];
    $key = array_search($id,$_SESSION['cart']);
    unset($_SESSION['cart'][$key]);
    unset($_SESSION['qty1'][$key]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    $_SESSION['qty1'] = array_values($_SESSION['qty1']);
    header("location:shop.php");

?>