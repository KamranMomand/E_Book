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
$status='Approved';

$app_sql="UPDATE `book_detail` SET `book_status` = '$status' WHERE `book_detail`.`book_id` = '$id';";

$app_result = mysqli_query($conn, $app_sql);

header('location:./admin_book.php');

?>