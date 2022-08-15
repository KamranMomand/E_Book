<?php
include('connection.php'); 

if(session_id()=="")
{
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header("location: ../index.php");
  }
}

$id=$_GET['id'];
$status='Rejected';

$app_sql="UPDATE `book_rating` SET `status` = '$status' WHERE `book_rating`.`rating_id` = '$id';";

$app_result = mysqli_query($conn, $app_sql);

header('location:./admin_rating.php');

?>