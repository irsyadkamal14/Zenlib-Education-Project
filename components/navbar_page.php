<?php

?>

<!-- Navbar -->

<nav class="navbar shadow-sm navbar-expand-lg fixed-top bg-white">
  <div class="container">
    <h2 class="brand">ZenLib</h2>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="collapse navbar-collapse flex-row-reverse"
      id="navbarNavDropdown"
    >
      <ul class="navbar-nav gap-3">
        <li class="nav-item fw-medium">
          <a class="nav-link" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item fw-medium">
          <a class="nav-link" href="#recomended">Rekomendasi</a>
        </li>
        <li class="nav-item fw-medium">
          <a class="nav-link" href="#footer">Tentang ZenLib</a>
        </li>
        <li class="nav-item fw-medium">
        <?php 
          if(isset($_SESSION['status_code']) && $_SESSION['status_code'] =='success')
          {
            echo '
              <button class="nav-link" data-bs-target="#logoutModal" data-bs-toggle="modal">
              Keluar
              </button>
            ';
          }else{ 
            echo '
              <button class="nav-link" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
              Masuk
              </button>
            '; 
            
          }
        ?>
          
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- Modal Login -->
<div
  class="modal fade"
  id="exampleModalToggle"
  aria-hidden="true"
  aria-labelledby="exampleModalToggleLabel"
  tabindex="-1"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="center mb-3">
          <h1 class="">ZenLib</h1>
          <p class="fs-6 fw-normal text-center">
            Masuk dengan Akun yang sudah terdaftar
          </p>
          <hr />
          <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
                echo '<div class="alert alert-danger" role="alert">'.$_SESSION['status'].'</div>';
                unset($_SESSION['status']);
            }
            ?>
          <form action="./code.php" method="POST" class="mt-4">
            <div class="input-field mb-2">
              <input
                type="email"
                class="input"
                placeholder="Masukkan Email"
                name="email"
              />
              <!-- <i class="bx bx-user"></i> -->
            </div>
            <div class="input-field mb-2">
              <input
                type="password"
                class="input"
                placeholder="Masukkan Password"
                name="password"
              />
              <!-- <i class="bx bx-lock-alt"></i> -->
            </div>
            <div class="input-field mb-2">
              <button type="submit" class="submit" name="btn_submit">Masuk</button>
            </div>
            <div class="buttom mt-4 mx-2">
              <div class="left">
                <label for="check">Lupa Akun ?</label>
              </div>
              <div class="right">
                <label><a href="#" data-bs-target="#signupToggle" data-bs-toggle="modal">Buat Akun</a></label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal SignUp -->
<div
  class="modal fade"
  id="signupToggle"
  aria-hidden="true"
  aria-labelledby="signupToggleLabel"
  tabindex="-1"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="center mb-3">
          <h1 class="">ZenLib</h1>
          <p class="fs-6 fw-normal text-center">
            Mari Bergabung di ZenLib Education
          </p>
          <hr />
          <form action="./code.php" method="POST" class="mt-4">
            <div class="input-field mb-2">
              <input type="text" class="input" placeholder="Username" name="username"required />
              <!-- <i class="bx bx-user"></i> -->
            </div>
            <div class="input-field mb-2">
              <input type="email" class="input" placeholder="Email" name="email"required />
              <!-- <i class="bx bx-lock-alt"></i> -->
            </div>
            <div class="input-field mb-2">
              <input type="password" class="input" placeholder="Masukkan Password" name="password"required />
              <!-- <i class="bx bx-lock-alt"></i> -->
            </div>
            <div class="input-field mb-2">
              <input type="password" class="input" placeholder="Konfirmasi Password" name="confirm"required />
              <!-- <i class="bx bx-lock-alt"></i> -->
            </div>
            <div class="input-field mb-2">
              <button type="submit" class="submit" name="btn_register">Daftar</button>
            </div>
            <div class="buttom mt-4 mx-2">
              <div class="right">
                <label>Punya Akun ? <a href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Masuk</a></label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu Yakin Keluar ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Seluruh informasi akan tersimpan otomatis dan tidak bisa kembali lagi.
      </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <form action="code.php" method="POST"> 
            <button type="submit" name="logout_btn" class="btn btn-primary">Keluar</button>
          </form>
      </div>
    </div>
  </div>
</div>