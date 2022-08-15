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
  <title>Ratings</title>



  <?php include('admin_header.php'); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ratings</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content" style="background:white;border-radius:30px;padding:10px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                    <th>Id</th>                   
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>User Name</th>
                    <th>Rating</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM `book_rating`
                    JOIN `book_detail` ON book_rating.book_id = book_detail.book_id
                    JOIN `user_detail` ON book_rating.user_id=user_detail.user_id";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <tr>
                    <td><?php echo" $row[rating_id]"; ?></td>
                    <td><img src="data:jpg;charset=utf8;base64,<?php echo base64_encode($row['book_image']); ?>" width="50px" height="50px"/></td>
                    <td><?php echo" $row[book_name]"; ?></td>
                    <td><?php echo" $row[user_name]"; ?></td>
                    <td><?php echo" $row[rating]"; ?></td>
                    <td><div class="btn-group">
                      <?php
                          if($row['status']=='Approved'){?>
                      <a class="btn btn-warning btn-xs" href="./admin_rating_reject.php?id=<?php echo $row['rating_id'] ?>">Reject</a>
                   <?php }elseif($row['status']=='Rejected'){ ?>
                    <a class="btn btn-primary btn-xs" href="./admin_rating_approve.php?id=<?php echo $row['rating_id'] ?>">Approve</a>
                   <?php }  ?>
                    </div></td>

                  </tr>
                  <?php }  ?>

                  </tbody>
                  <tfoot>
                  <tr>
                  
                  <th>Id</th>                   
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>User Name</th>
                    <th>Rating</th>
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