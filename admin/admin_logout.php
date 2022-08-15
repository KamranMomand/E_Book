<?php
session_start();
session_destroy();
    if(session_id()=="")
    {
      session_start();
      if(!isset($_SESSION['admin']))
      {
        header("location: ../index.php");
    }
    }
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location: ../index.php");
    }
?>