<?php
include('settings/scurity.php');  
include('components/header_page.php'); 
include('components/navbar_page.php'); 
?>
    <div class="container">
      <!-- Hero -->

      <div class="row align-items-center hero mt-5">
        <div class="col-lg-5 align-self-center">
          <h1 class="fw-bolder">Baca Buku Seru di ZenLib</h1>
          <p class="fw-medium">
            Beragam buku bacaan seru dan edukatif bisa kamu temukan di sini.
          </p>
          <?php
           if(isset($_SESSION['status_code']) && $_SESSION['status_code'] =='success'){
            echo '
              <a class="btn" href="detail.php" type="submit">Masuk</a>
            ';
           }else{
            echo '
              <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" type="submit">Masuk</button>
            ';
           }
          ?>
          
        </div>
        <div class="col-lg-7 justify-content-center">
          <img src="assets/images/hero.svg" class="img-fluid" alt="Buku" />
        </div>
      </div>

      <!-- Book -->
        <!-- Book -->
        <div class="d-flex justify-content-between" id="recomended">
        <h5 class="fw-bolder">Rekomendasi Buku</h5>
        <?php 
       
        if(isset($_SESSION['status_code']) && $_SESSION['status_code'] =='success')
        {
          echo '<a href="detail.php">Selengkapnya</a>'; 
        }else{
          echo '<a data-bs-target="#exampleModalToggle" data-bs-toggle="modal" href="">Selengkapnya</a>';
        }
        ?>
        <!-- <a href="">Lainnya</a> -->
      </div>
      <hr />
      <div
        class="d-flex align-content-start flex-wrap gap-4 justify-content-center"
      >
        <a
          href="https://books.google.co.id/books?id=VSW4EAAAQBAJ&hl=id&source=gbs_api"
          class="card border border-0"
          style="width: 12rem"
        >
          <img src="assets/images/content.jfif" class="card-img-top" alt="..." style="height: 18rem"/>
          <!--div class="card-body px-0">
            <p class="card-text fw-medium">
              Unlimited access to over 1,000,000 textbooks
            </p>
          </div-->
        </a>
        <a
          href="https://books.google.co.id/books?id=_SrdDwAAQBAJ&hl=&source=gbs_api"
          class="card border border-0 rounded"
          style="width: 12rem"
        >
          <img
            src="assets/images/content1.jfif"
            class="card-img-top"
            alt="..."
            style="height: 18rem"
          />
          <!--div class="card-body px-0">
            <p class="card-text fw-medium">
              Unlimited access to over 1,000,000 textbooks
            </p>
          </div-->
        </a>
        <a
          href="https://books.google.co.id/books?id=oeleEAAAQBAJ&hl=&source=gbs_api"
          class="card border border-0 rounded"
          style="width: 12rem"
        >
          <img
            src="assets/images/content2.jfif"
            class="card-img-top"
            style="height: 18rem"
            alt="..."
          />
          <!--div class="card-body px-0">
            <p class="card-text fw-medium">
              Unlimited access to over 1,000,000 textbooks
            </p>
          </div-->
        </a>
        <a
          href="https://books.google.co.id/books?id=VVg0EAAAQBAJ&hl=&source=gbs_api"
          class="card border border-0"
          style="width: 12rem"
        >
          <img
            src="assets/images/content3.jfif"
            class="card-img-top rounded"
            style="height: 18rem"
            alt="..."
          />
          <!--div class="card-body px-0">
            <p class="card-text fw-medium">
              Unlimited access to over 1,000,000 textbooks
            </p>
          </div-->
        </a>
        <a
          href="https://books.google.co.id/books?id=X4siEAAAQBAJ&hl=&source=gbs_api"
          class="card border border-0"
          style="width: 12rem"
        >
          <img
            src="assets/images/content4.jfif"
            class="card-img-top"
            alt="..."
            style="height: 18rem"
          />
          <!--div class="card-body px-0">
            <p class="card-text fw-medium">
              Unlimited access to over 1,000,000 textbooks
            </p>
          </div-->
        </a>
      </div>
      <hr />
    </div>

    

    

<?php
include('components/script_page.php');
include('components/footer_page.php');
?>