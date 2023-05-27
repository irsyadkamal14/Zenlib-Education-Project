<?php
include('settings/scurity.php');  
include('components/header.php'); 
include('components/navbar.php'); 
?>

<!-- Add Book -->
<div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label> Title </label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label>Sub-Title</label>
                <input type="text" name="subtitle" class="form-control" placeholder="Enter Sub-Title" required>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" name="datebook" class="form-control" placeholder="Enter Date" required>
            </div>
            <div class="form-group">
                <label>Discription</label>
                <input type="text" name="discription" class="form-control" placeholder="Confirm Discription" required>
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" placeholder="Enter Author" required>
            </div>
            <div class="form-group">
                <label>Viewer Link*</label>
                <input type="text" name="viewer" class="form-control" placeholder="Url Book" required>
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label">Masukkan Cover Buku</label>
                <input type="file" name="thumbnail" class="form-control" id="coverfile" required>
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambahkan Buku 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbook">
          Buku + 
        </button>
    </h6>
  </div>

  <div class="card-body">

  <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
    {
        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }
  ?>

    <div class="table-responsive">
        <?php
          $query = "SELECT * FROM book";
          $query_book = mysqli_query($connection, $query);
        ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Title </th>
            <th>Author </th>
            <th>Date</th>
            <th>Discription</th>
            <th>Thumbnail</th>
            <th>Edit </th>
            <th>Hapus </th>

          </tr>
        </thead>
        <tbody>
            <?php
              if(mysqli_num_rows($query_book) >  0){
                for($i = 0; $i < mysqli_num_rows($query_book) ; $i++){
                  $row = mysqli_fetch_assoc($query_book)
            ?>
     
     <tr>
              <td><?php  echo $i+1; ?></td>
              <td><?php  echo $row['title']; ?></td>
              <td></td>
              <td><?php  echo $row['datebook']; ?></td>
              <td><?php  echo $row['discription']; ?></td>
              <td>
                <div class="text-center">
                  <img src="assets/db/<?php  echo $row['thumbnail']; ?>" width="100px" class="rounded img-fluid" alt="Thumbnail">
                </div>    
              </td>
              <td>
              
                <form action="editbook.php" method="post">
                  <input
                    type="hidden"
                    name="edit_id"
                    value="<?php echo $row['id']; ?>"
                  />
                  <button type="submit" name="edit_btn" class="btn btn-success" data-toggle="modal" data-target="#editbook">
                 Edit
                </button>
                </form>
              </td>
              <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="thumbnail_id" value="<?php echo $row['thumbnail'] ?>">
                  <input
                    type="hidden"
                    name="delete_id"
                    value="<?php echo $row['id']; ?>"
                  />
                  <button
                    type="submit"
                    name="delete_book"
                    class="btn btn-danger"
                  >
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
            <?php
                  } 
              }
              else {
                  echo "No Record Found";
              }
            ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('components/scripts.php');
include('components/footer.php');
?>