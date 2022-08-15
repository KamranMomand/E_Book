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

$id=$_REQUEST['id'];
$sql = "DELETE FROM `user_role` WHERE `user_role_id` = $id"; 
$result = mysqli_query($conn,$sql);
if(!$result)
    {
      echo "<script> alert('The record has not been Deleted because of this error ".mysqli_error($conn)."'); </script>";
    }
    else
    {
        header('location:./admin_user_role.php');
    }
?>