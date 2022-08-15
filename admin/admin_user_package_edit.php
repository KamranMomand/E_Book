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
  <title>Books Detail</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <?php


    $id=$_GET['id'];
    $sql = "SELECT * FROM `user_package_detail` WHERE `user_pkg_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_row($result);

    $usr_sql="SELECT * FROM `user_detail`";
    $usr_result = mysqli_query($conn, $usr_sql);

    $pkdet_sql="SELECT * FROM `package_detail`";
    $pkdet_result = mysqli_query($conn, $pkdet_sql);

    if(isset($_POST['edit_submit']))
    {
        $usr_name = $_POST["usr_name"];
        $pkdet_name = $_POST["pkdet_name"];
        $activation_date = $_POST["activation_date"];
        $expiration_date = $_POST["expiration_date"];
    $sql = "UPDATE `user_package_detail` SET `user_id` = '$usr_name', `pkg_id` = '$pkdet_name', `user_pkg_order_date` = '$activation_date', `user_pkg_exp_date` = '$expiration_date' WHERE `user_package_detail`.`user_pkg_id` = '$id';";
    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
      echo "<script> alert('The record has not been inserted because of this error ".mysqli_error($conn)."'); </script>";
    }
    else
    {
        header('location:./admin_user_package.php');
    }
  }
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include('admin_header.php'); ?>
    <div class="content-wrapper">

         <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <section class="content" style="background:white;border-radius:30px;padding:10px;">
    <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <label for="exampleInputEmail1">User Name: </label>
                  <select class="form-select" name="usr_name" aria-label="Default select example">
                      <?php 

                      while($usr_row=mysqli_fetch_assoc($usr_result))
                      { 
                          if($usr_row['user_id']==$row[1])
                          {
                        ?>
                      <option value="<?php echo $usr_row['user_id'];  ?>" selected><?php echo $usr_row['user_name']; ?></option>
                    <?php }else{ ?>
                     <option value="<?php echo $usr_row['user_id'];  ?>"><?php echo $usr_row['user_name']; ?></option>
   
                     <?php }} ?>
                      </select><br>

                      <label for="exampleInputEmail1">Package Name: </label>
                    <select class="form-select" name="pkdet_name" aria-label="Default select example">
                      <?php while($pkdet_row=mysqli_fetch_assoc($pkdet_result))
                      { if($pkdet_row['pkg_id']==$row[2])
                          {
                        ?>
                      <option value="<?php echo $pkdet_row['pkg_id'];  ?>"selected><?php echo $pkdet_row['pkg_name']; ?></option>
                    <?php }else{ ?>
                     <option value="<?php echo $pkdet_row['pkg_id'];  ?>"><?php echo $pkdet_row['pkg_name']; ?></option>
   
                     <?php }} ?>
                      </select><br>
                    <label for="exampleInputEmail1">Activation Date: </label>
                    <input type="date" value="<?php echo $row[3]; ?>" class="form-control" id="activation_date" name="activation_date" placeholder="Enter Name">
                    <br>
                    <label for="exampleInputEmail1">Expiration Date: </label>
                    <input type="date" value="<?php echo $row[4]; ?>" class="form-control"  id="expiration_date" name="expiration_date"><br>
                    
                    
                    
                    
                  </div>
                
      
        <a href="./admin_book.php" class="btn btn-secondary">Go Back</a>
        <button type="submit" class="btn btn-success" name="edit_submit">Update</button>
      
      </form> 
                      </section>


                      


    
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include('admin_footer.php'); ?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
      $("#activation_date").datepicker({
          dateFormat: "dd/mm/yy",
          maxDate: 0,
          minDate: "01/01/2000",
          changeYear: true,
          changeMonth: true
      });
      
</script>
<script>
    $("#expiration_date").datepicker({
          dateFormat: "dd/mm/yy",
          maxDate: 0,
          minDate: "01/01/2000",
          changeYear: true,
          changeMonth: true
      });
</script>
</body>
</html>
