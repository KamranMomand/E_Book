<?php include('connection.php'); ?>
<?php
if(session_id()=="")
{
  session_start();
  if(!isset($_SESSION['admin']))
  {
    header("location: ../index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>

  
  <?php include('admin_header.php'); ?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
    <?php 
        
        if($_SESSION['admin'])
        {
        $id=$_SESSION['admin_id'];
        $sql="SELECT * From `user_detail` where `user_id` = '$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
          { ?>
        
                <div class="card">
                    <h5 class="card-header">Account Detail</h5>
                    <div class="card-body">
                    <p class="card-text"><b>Name : </b><?php echo $row['user_name'] ?></p>
                    <p class="card-text"><b>Email : </b><?php echo $row['user_email'] ?></p>
                    <p class="card-text"><b>Password : </b><?php echo $row['user_password'] ?></p>
                    <a href="admin_profile_edit.php" class="btn btn-warning">Edit</a>
                    </div>
                </div>
           

          <?php }  
    }
    ?>
    
    </div>
    <!-- /.content -->
  </div>


  <?php include('admin_footer.php'); ?>
