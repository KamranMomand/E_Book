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
  <title>Category</title>

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
    if(isset($_POST['insert_submit']))
    {
        $insert_cat_name = $_POST["insert_cat_name"];
    
    $sql = "INSERT INTO `book_category` (`book_cat_name`) VALUES ('$insert_cat_name')";
    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
      echo "<script> alert('The record has not been inserted because of this error ".mysqli_error($conn)."'); </script>" ;
    }
    }
?>
  <?php
    if(isset($_POST['edit_btn']))
    {
        $edit_cat_id = $_POST["edit_id"];
        $edit_cat_name = $_POST["edit_cat_name"];
    $sql = "UPDATE `book_category` SET `book_cat_name` = '$edit_cat_name' WHERE `book_category`.`book_cat_id` = $edit_cat_id;";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
      echo "<script> alert('The record has not been inserted because of this error ".mysqli_error($conn)."'); </script>";
    }
  }

  ?>
  <?php
    if(isset($_GET['delete']))
    {
        $delete_id = $_GET["delete"];
    $sql = "DELETE FROM `book_category` WHERE `book_category`.`book_cat_id` = $delete_id";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
      echo "<script> alert('The record has not been deleted because of this error ".mysqli_error($conn)."'); </script>";
    }
  }

  ?>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- insert modal start -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModalLabel">Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="insert_cat_name" name="insert_cat_name" placeholder="Enter Category">
                  </div>
                </div>
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="insert_submit">Insert</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!-- insert modal end -->

  <!-- edit modal start -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="edit_cat_name" name="edit_cat_name" placeholder="Enter Category">
                  </div>
                </div>
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="edit_btn">Save changes</button>
      </div>
              </form>
      
    </div>
  </div>
</div>
<!-- Edit modal end -->
<div class="wrapper">
  <?php include('admin_header.php'); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Books Category</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background:white;border-radius:30px;padding:10px;">
    <button class="insert btn btn-block btn-success btn-md" data-toggle="modal" data-target="#insertModal" style="width:20%; margin-left:40%;">Create New</button>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM `book_category`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <tr>
                    <td><?php echo" $row[book_cat_id]"; ?></td>
                    <td><?php echo" $row[book_cat_name]"; ?></td>
                    <td><div class="btn-group">
                    <button type="button" class="edit btn btn-success btn-sm" data-toggle="modal" data-target="#editModal" <?php echo "id=".$row['book_cat_id']."" ?>>Edit</button>
                    <button type="button" class="delete btn btn-danger btn-sm" <?php echo "id=d".$row['book_cat_id']."" ?>>Delete</button>
                    </div>
                  </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('admin_footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    inserts = document.getElementsByClassName('insert');
    Array.from(inserts).forEach((element)=>{
      element.addEventListener("click",(e)=>{
        console.log("insert", );
        $('#insertModal').modal('toggle')
      })
    })

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener("click",(e)=>{
        console.log("edit", );
        tr = e.target.parentNode.parentNode.parentNode;
        cat_name = tr.getElementsByTagName("td")[1].innerText;
        console.log(cat_name);
        edit_cat_name.value = cat_name;
        edit_id.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle')
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener("click",(e)=>{
        console.log("delete", );
        delete_id = e.target.id.substr(1,);
        if(confirm("Are you sure you want to delete this?")){
          console.log("yes");
          window.location = `admin_category.php?delete=${delete_id}`;
        }
        else{
          console.log("no");
        } 
      })
    })
        
        
</script>

</body>
</html>
