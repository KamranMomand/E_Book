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
  <title>Edit Profile</title>

  
  <?php include('admin_header.php'); ?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Profile</h1>
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
        $row=mysqli_fetch_row($result);
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $ed_sql="UPDATE `user_detail` SET `user_name` = '$name', `user_email` = '$email', `user_password` = '$pass' WHERE `user_detail`.`user_id` = '$id';";
            $ed_result = mysqli_query($conn, $ed_sql);

            if(!$ed_result)
            {
            echo "<script> alert('The record has not been inserted because of this error ".mysqli_error($conn)."'); </script>" ;
            }
            else
            {
                echo "<script> alert('Your account changes are successfuly Saved'); </script>" ;
            }
        }
        }
        ?>
                <form method="post">
                <div class="card">
                    <h5 class="card-header">Edit Account Detail</h5>
                    <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">User Name: </label>
                    <input type="text" class="form-control" value="<?php echo $row[1]?>" name="name" placeholder="Enter Name">
                    <br>
                    <label for="exampleInputEmail1">User Email: </label>
                    <input type="email" class="form-control" value="<?php echo $row[2]?>"  name="email" placeholder="Enter Email">
                    <br>
                    <label for="exampleInputEmail1">User Password:</label>
                    <input type="text" class="form-control" value="<?php echo $row[3]?>" name="pass" placeholder="Enter Password">
                    </div>
                    <br>
                    <a href="admin_profile.php" class="btn btn-primary">Go Back</a>
                    <button type="submit" name="submit" class="btn btn-warning">Save Changes</button>
                </div>
                </div>
                </form><br>
           

    </div>
    <!-- /.content -->
  </div>


  <?php include('admin_footer.php'); ?>
