<?php

if(session_id()=="")
{
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header("location: ../index.php");
  }
}

include('connection.php');
$id=$_REQUEST['id'];
$sql = "DELETE FROM `book_detail` WHERE `book_id` = $id"; 
$result = mysqli_query($conn,$sql);
if(!$result)
    {
      echo "<script> alert('The record has not been Deleted because of this error ".mysqli_error($conn)."'); </script>";
    }
    else
    {
        header('location:./admin_book.php');
    }
?>