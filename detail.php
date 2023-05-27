<?php
include('settings/scurity.php');  
include('components/header_page.php'); 
include('components/navbar_page.php'); 

?>
    <!-- Search -->
    <div class="container align-containt-center">
      <div class="d-flex justify-content-center">
        <div class="input-box">
          <i class="uil uil-search"></i>
          <input id="search-input" type="text" placeholder="Cari Bukumu..." />
          <button id="search-btn" class="button">Search</button>
        </div>
      </div>

      <!-- Book -->
      <hr />
      <div
        id="bookList"
        class="book-list d-flex align-content-start flex-wrap gap-4 justify-content-center"
      >
        <!-- <div class="card border border-0" style="width: 12rem">
          <img src="../assets/images/book.svg" class="card-img-top" alt="..." />
          <div class="card-body px-0">
            <p class="card-text fw-medium">
              Unlimited access to over 1,000,000 textbooks
            </p>
          </div>
        </div> -->
      </div>
      <hr />
    </div>

    <!-- Modal -->

    <div
      class="modal fade"
      id="exampleModalToggle2"
      aria-hidden="true"
      aria-labelledby="exampleModalToggleLabel2"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Informasi Buku</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- <div class="modal-body mx-5 my-3">
            <div class="col">
              <div class="row d-flex align-items-center">
                <div class="col-lg-4 d-flex justify-content-center">
                  <img
                    src="../assets/images/book.svg"
                    class="img-thumbnail"
                    alt="..."
                  />
                </div>
                <div class="col-lg-8 lh-1">
                  <p class="fs-5 fw-bolder lh-sm mt-2">
                    Buku Panduan Guru Belajar dan Bermain Berbasis Buku untuk
                    Satuan PAUD
                  </p>
                  <div class="row">
                    <p class="fs-6 fw-normal">Penulis :</p>
                  </div>
                  <div class="row">
                    <p class="fs-6 fw-normal">Penerbit :</p>
                  </div>
                  <div class="row">
                    <p class="fs-6 fw-normal">Tahun :</p>
                  </div>
                  <div class="row">
                    <p class="fs-6 fw-normal">Edisi :</p>
                  </div>
                  <button type="button" class="btn btn-outline-danger">
                    Baca Buku
                  </button>
                </div>
              </div>
              <div class="col mt-4">
                <p class="fs-5 fw-medium">Deskripsi</p>
                <p class="lh-base">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptatum rerum, eligendi, velit atque, quibusdam at ratione
                  tempora quasi nostrum officia numquam. Distinctio laborum
                  repellendus dolore nulla eos magni? Corrupti, labore? Lorem,
                  ipsum dolor sit amet consectetur adipisicing elit. Voluptatum
                  rerum, eligendi, velit atque, quibusdam at ratione tempora
                  quasi nostrum officia numquam. Distinctio laborum repellendus
                  dolore nulla eos magni? Corrupti, labore? Lorem, ipsum dolor
                  sit amet consectetur adipisicing elit. Voluptatum rerum,
                  eligendi, velit atque, quibusdam at ratione tempora quasi
                  nostrum officia numquam. Distinctio laborum repellendus dolore
                  nulla eos magni? Corrupti, labore?
                </p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Footer -->
<?php
include('components/script_page.php');
include('components/footer_page.php');
?>
