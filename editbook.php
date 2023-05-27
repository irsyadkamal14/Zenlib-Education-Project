<?php
include('settings/scurity.php');  
include('components/header.php'); 
include('components/navbar.php');

?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Update Buku </h6>
    </div>
    <div class="card-body">
    <?php
    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id']; 
        $query = "SELECT * FROM book WHERE id='$id' ";
        $query_edit = mysqli_query($connection, $query);
        foreach($query_edit as $row)
        {
    ?>

    <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
             <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label> Title </label>
                <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control" placeholder="Enter Title" >
            </div>
            <div class="form-group">
                <label>Sub-Title</label>
                <input type="text" name="edit_subtitle" value="<?php echo $row['subtitle'] ?>" class="form-control" placeholder="Enter Sub-Title" >
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" name="edit_datebook" value="<?php echo $row['datebook'] ?>" class="form-control" placeholder="Enter Date" >
            </div>
            <div class="form-group">
                <label>Discription</label>
                <input type="text" name="edit_discription" value="<?php echo $row['discription'] ?>" class="form-control" placeholder="Confirm Discription" >
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="edit_author" value="<?php echo $row['author'] ?>" class="form-control" placeholder="Enter Author" >
            </div>
            <div class="form-group">
                <label>Viewer Link*</label>
                <input type="text" name="edit_viewer" value="<?php echo $row['viewer'] ?>" class="form-control" placeholder="Url Book" >
            </div>
            <div class="form-group">
                <div class="text-center">
                <input type="hidden" name="old_thumbnail" value="<?php echo $row['thumbnail'] ?>">
                  <img src="assets/db/<?php echo $row['thumbnail']; ?>" width="250px" class="rounded img-fluid" alt="Thumbnail">
                </div>  
            </div>
            <div class="form-group">
                <label for="formFile" class="form-label">Masukkan Cover Buku</label>
                <input type="file" name="edit_thumbnail" class="form-control" id="coverfile">
            </div>
        
        </div>
        <div class="modal-footer">
            <a type="button" href="addbook.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
            <button type="submit" name="edit_book" class="btn btn-primary">Update</button>
        </div>
    </form>
    <?php
            }
        }
    ?>
    </div>
</div>
</div>

</div>


<?php
include('components/scripts.php');
include('components/footer.php');
?>