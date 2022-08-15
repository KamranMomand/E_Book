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
    $sql = "SELECT * FROM `book_detail` WHERE `book_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_row($result);

    $aut_sql="SELECT * FROM `author_details`";
    $aut_result = mysqli_query($conn, $aut_sql);

    $cat_sql="SELECT * FROM `book_category`";
    $cat_result = mysqli_query($conn, $cat_sql);

    if(isset($_POST['edit_submit']))
    {
        $edit_book_name = $_POST["edit_book_name"];
        $edit_book_image = addslashes(file_get_contents($_FILES['edit_book_image']['tmp_name']));
        $edit_book_price = $_POST["edit_book_price"];
        $edit_book_release_date = $_POST["edit_book_release_date"];
        $edit_book_description = $_POST["edit_book_description"];
        $edit_book_pdf = addslashes(file_get_contents($_FILES['edit_book_pdf']['tmp_name']));
        $aut_name = $_POST["aut_name"];
        $cat_name = $_POST["cat_name"];
    $sql = "UPDATE `book_detail` SET `book_name`=`$edit_book_name`,`book_price`=`$edit_book_price`,`book_image`=`$edit_book_image`,`book_release_date`=`$edit_book_release_date`,`book_description`=`$edit_book_description`,`author_id`=`$aut_name`,`book_cat_id`=`$cat_name`,`book_pdf`=`$edit_book_pdf` WHERE `book_detail`.`book_id` = '$id';";
    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
      echo "<script> alert('The record has not been inserted because of this error ".mysqli_error($conn)."'); </script>";
    }
    else
    {
        header('location:./admin_book.php');
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
                    <label for="exampleInputEmail1">Book Name: </label>
                    <input type="text" value="<?php echo $row[1]; ?>" class="form-control" id="edit_book_name" name="edit_book_name" placeholder="Enter Name">
                    <br>
                    <label for="exampleInputEmail1">Book Cover Image: </label>
                    <input type="file" value="<?php  ?>" class="form-control-file"  id="edit_book_image" name="edit_book_image"><br>
                    <label for="exampleInputEmail1">Book Price: </label>
                    <input type="number" value="<?php echo $row[2]; ?>" class="form-control" id="edit_book_price" name="edit_book_price" placeholder="Enter Book Price">
                    <label for="exampleInputEmail1">Release Date: </label>
                    <input type="date" value="<?php echo $row[4]; ?>" class="form-control" id="edit_book_release_date" name="edit_book_release_date" data-target="#reservationdate"/>
                    <label for="exampleInputEmail1">Book Description: </label>
                    <input type="text" value="<?php echo $row[5]; ?>" class="form-control" id="edit_book_description" name="edit_book_description" placeholder="Enter Description">
                    <label for="exampleInputEmail1">Book File: </label>
                    <input type="file" value="<?php  ?>" class="form-control-file"  id="edit_book_pdf" name="edit_book_pdf"><br>
                    <label for="exampleInputEmail1">Author: </label>
                    <select class="form-select" name="aut_name" aria-label="Default select example">
                      <?php 

                      while($aut_row=mysqli_fetch_assoc($aut_result))
                      { 
                          if($aut_row['auther_id']==$row[6])
                          {
                        ?>
                      <option value="<?php echo $aut_row['auther_id'];  ?>" selected><?php echo $aut_row['auther_name']; ?></option>
                    <?php }else{ ?>
                     <option value="<?php echo $aut_row['auther_id'];  ?>"><?php echo $aut_row['auther_name']; ?></option>
   
                     <?php }} ?>
                      </select><br>
                    <label for="exampleInputEmail1">Book Category: </label>
                    <select class="form-select" name="cat_name" aria-label="Default select example">
                      <?php while($cat_row=mysqli_fetch_assoc($cat_result))
                      { if($cat_row['book_cat_id']==$row[7])
                          {
                        ?>
                      <option value="<?php echo $cat_row['book_cat_id'];  ?>"selected><?php echo $cat_row['book_cat_name']; ?></option>
                    <?php }else{ ?>
                     <option value="<?php echo $cat_row['book_cat_id'];  ?>"><?php echo $cat_row['book_cat_name']; ?></option>
   
                     <?php }} ?>
                      </select>
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
      $("#insert_book_release_date").datepicker({
          dateFormat: "dd/mm/yy",
          maxDate: 0,
          minDate: "01/01/2000",
          changeYear: true,
          changeMonth: true
      });
</script>
</body>
</html>
