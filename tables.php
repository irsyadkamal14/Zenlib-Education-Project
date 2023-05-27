<?php
include('settings/scurity.php'); 
include('components/header.php'); 
include('components/navbar.php'); 
?>

<div class="container-fluid">
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Buku</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php
          $query = "SELECT * FROM book";
          $query_book = mysqli_query($connection, $query);
        ?>

        <table
          class="table table-bordered"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>Cover</th>
              <th>Title</th>
              <th>Sub-Title</th>
              <th>Author</th>
              <th>Date</th>
              <th>Publish</th>
              <th>Discription</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($query_book) >
            0){ for($i = 0; $i < mysqli_num_rows($query_book) ; $i++){ $row =
            mysqli_fetch_assoc($query_book) ?>
            <tr>
              <td><?php  echo $i+1; ?></td>
              <td><?php  echo "Images   "; ?></td>
              <td><?php  echo $row['title']; ?></td>
              <td><?php  echo $row['subtitle']; ?></td>
              <td></td>
              <td><?php  echo $row['datebook']; ?></td>
              <td></td>
              <td><?php  echo $row['discription']; ?></td>
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
