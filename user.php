<?php
include('settings/scurity.php'); 
include('components/header.php'); 
include('components/navbar.php'); 

?>

<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Profil Pengguna</h6>
    </div>

    <div class="card-body">
      <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
          echo '<div class="alert alert-danger" role="alert">'.$_SESSION['status'].'</div>';
          unset($_SESSION['status']);
      }

      if(isset($_SESSION['success']) && $_SESSION['success'] !='')
      {
          echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
          unset($_SESSION['success']);
      }
      ?>
      <div class="table-responsive">
        <?php
          $query = "SELECT * FROM users";
          $query_users = mysqli_query($connection, $query);
        ?>

        <table
          class="table table-bordered"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Email</th>
              <th>Password</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(mysqli_num_rows($query_users) >  0){
                for($i = 0; $i < mysqli_num_rows($query_users) ; $i++){
                  $row = mysqli_fetch_assoc($query_users)
            ?>

            <tr>
              <td><?php  echo $i+1; ?></td>
              <td><?php  echo $row['username']; ?></td>
              <td><?php  echo $row['email']; ?></td>
              <td><?php  echo str_repeat( "*", strlen( $row['password'] )) ?></td>
              <td>
                <form action="code.php" method="post">
                  <input
                    type="hidden"
                    name="delete_id"
                    value="<?php echo $row['id']; ?>"
                  />
                  <button
                    type="submit"
                    name="delete_user"
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
