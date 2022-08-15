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

  



  <?php
    if(isset($_POST['insert_submit']))
    {
        $insert_aut_name = $_POST["insert_aut_name"];
        $insert_aut_img = addslashes(file_get_contents($_FILES['insert_aut_img']['tmp_name']));
        $insert_aut_desc = $_POST["insert_aut_desc"];
        
    $sql = "INSERT INTO `author_details` (`auther_name`,`auther_image`,`auther_desc`) VALUES ('$insert_aut_name', '$insert_aut_img', '$insert_aut_desc');";
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
        $edit_aut_id = $_POST["edit_id"];
        $edit_aut_name = $_POST["edit_aut_name"];
        $edit_aut_img = addslashes(file_get_contents($_FILES['edit_aut_img']['tmp_name']));
        $edit_aut_desc = $_POST["edit_aut_desc"];
    $sql = "UPDATE `author_details` SET `auther_name` = '$edit_aut_name',`auther_image` = `$edit_aut_img`, `auther_desc` = '$edit_aut_desc' WHERE `author_details`.`auther_id` = $edit_aut_id;";
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
    $sql = "DELETE FROM `author_details` WHERE `author_details`.`auther_id` = $delete_id";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
      echo "<script> alert('The record has not been deleted because of this error ".mysqli_error($conn)."'); </script>";
    }
  }

  ?>



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
      <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Author Name</label>
                    <input type="text" class="form-control" id="insert_aut_name" name="insert_aut_name" placeholder="Enter Name">
                    <label for="exampleInputEmail1">Author Image (Optional)</label>
                    <input type="file"  id="insert_aut_img" name="insert_aut_img"><br>
                    <label for="exampleInputEmail1">Author Description</label>
                    <input type="text" class="form-control" id="insert_aut_desc" name="insert_aut_desc" placeholder="Enter Description">
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
                    <label for="exampleInputEmail1">Author Name</label>
                    <input type="text" class="form-control" id="edit_aut_name" name="edit_aut_name" placeholder="Enter Name">
                    <label for="exampleInputEmail1">Author Image (Optional)</label>
                    <input type="file"  id="edit_aut_img" name="edit_aut_img"><br>
                    <label for="exampleInputEmail1">Author Description</label>
                    <input type="text" class="form-control" id="edit_aut_desc" name="edit_aut_desc" placeholder="Enter Description">
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

  <?php include('admin_header.php'); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Authors</h1>
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
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM `author_details`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    <tr>
                    <td><?php echo" $row[auther_id]"; ?></td>
                    <td><?php echo" $row[auther_name]"; ?></td>
                    <td><img src="data:jpg;charset=utf8;base64,<?php echo base64_encode($row['auther_image']); ?>" width="100px" height="100px"/></td>
                    <td><?php echo" $row[auther_desc]"; ?></td>
                    <td><div class="btn-group">
                    <button type="button" class="edit btn btn-success btn-sm" data-toggle="modal" data-target="#editModal" <?php echo "id=".$row['auther_id']."" ?>>Edit</button>
                    <button type="button" class="delete btn btn-danger btn-sm" <?php echo "id=d".$row['auther_id']."" ?>>Delete</button>
                    </div>
                  </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
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
        aut_name = tr.getElementsByTagName("td")[1].innerText;
        aut_image = tr.getElementsByTagName("td")[2].innerText;
        aut_desc = tr.getElementsByTagName("td")[3].innerText;
        console.log(aut_desc,aut_image,aut_name);
        edit_aut_name.value = aut_name;
        edit_aut_desc.value = aut_desc;
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
          window.location = `admin_author.php?delete=${delete_id}`;
        }
        else{
          console.log("no");
        } 
      })
    })
        
        
</script>

</body>
</html>
