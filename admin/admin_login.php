<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


    <?php
        session_start();
        if(isset($_POST['admin_login']))
        {
            $email=$_POST['email'];
            $pass=$_POST['pass'];

            if(empty($email) || empty($pass))
            {
                echo "<script> alert('Please Fill In The Form'); </script>" ;
            }
            else
            {
                $sql="SELECT * FROM `user_detail` JOIN `user_role` ON user_detail.user_role_id=user_role.user_role_id WHERE `user_email`='$email' && `user_password`='$pass' && `user_role_name`='Admin'";
                $result=mysqli_query($conn,$sql);
                if($result){
                  if(mysqli_num_rows($result)>0)
                  {
                      $row=mysqli_fetch_array($result);
                      $_SESSION['admin']=$row[1];
                      $_SESSION['admin_id']=$row[0];
                      header("location: admin_book.php");
                  }
                else
                {
                    echo "<script> alert('Invalid Email or Password'); </script>" ;

                }
            }
          }

        }
    ?>









</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>E</b>Book</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login in to your account</p>

      <form method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="pass" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" name="admin_login" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        
      </form>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
