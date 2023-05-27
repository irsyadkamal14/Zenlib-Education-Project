const searchBtn = document.getElementById("search-btn");
const listBook = document.getElementById("bookList");
const bookDetailsContent = document.querySelector(".modal");
searchBtn.addEventListener("click", getListBook);
listBook.addEventListener("click", getBookDetail);

function getListBook() {
  var APIKey = `https://www.googleapis.com/books/v1/volumes?q=`;
  let searchInputTxt = document.getElementById("search-input").value.trim();
  fetch(APIKey + searchInputTxt + "+inauthor&maxResults=40")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      let html = "";
      if (data.items) {
        data.items.forEach((book) => {
          html += `
              <div class="card border border-0" id="${book?.id}"  data-bs-toggle="modal"
              data-bs-target="#exampleModalToggle2"  style="width: 12rem">
                <img class="images" src="${book?.volumeInfo?.imageLinks?.smallThumbnail}" class="img-fluid img-thumbnail card-img-top" style="height: 16rem" alt="ZenLib Book" />
                <div class="card-body px-0">
                  <p class="card-text fw-normal">
                    "${book?.volumeInfo?.title}"
                  </p>
                </div>
              </div>
              `;
        });
      }
      listBook.innerHTML = html;
    });
}

function getBookDetail(e) {
  e.preventDefault();
  if (e.target.classList.contains("images")) {
    let bookItem = e.target.parentElement;
    console.log(bookItem);
    fetch(`https://www.googleapis.com/books/v1/volumes/${bookItem.id}`)
      .then((response) => response.json())
      .then((data) => detailBookModal(data));
  } else {
    console.log("Error");
  }
}

function detailBookModal(bookList) {
  console.log(bookList.id);
  html = `
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">
              Informasi Buku
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body mx-5 my-3">
            <div class="col">
              <div class="row d-flex align-items-center">
                <div class="col-lg-4 d-flex justify-content-center">
                  <img
                    src="${bookList?.volumeInfo?.imageLinks?.smallThumbnail}"
                    class="img-thumbnail"
                    style="height: 18rem"
                    alt="Zenli Education"
                  />
                </div>
                <div class="col-lg-8 lh-1">
                  <p class="fs-5 fw-bolder lh-sm mt-2">
                    ${bookList?.volumeInfo?.title}
                  </p>
                  <div class="row">
                    <p class="fs-6 fw-normal">Penulis : ${bookList?.volumeInfo?.title}</p>
                  </div>
                  <div class="row">
                    <p class="fs-6 fw-normal">Penerbit : ${bookList?.volumeInfo?.publisher} </p>
                  </div>
                  <div class="row">
                    <p class="fs-6 fw-normal">Tahun : ${bookList?.volumeInfo?.publishedDate}</p>
                  </div>
                  <div class="row">
                    <p class="fs-6 fw-normal">Edisi : ${bookList?.volumeInfo?.title}</p>
                  </div>
                  <button type="button" onclick="location.href='${bookList?.volumeInfo?.previewLink}'" class="btn btn-outline-danger">
                    Baca Buku
                  </button>
                </div>
              </div>
              <div class="col mt-4">
                <p class="fs-5 fw-medium">Deskripsi</p>
                <p class="lh-base">
                <p class="fs-6 fw-normal">
                  ${bookList?.volumeInfo?.description}</p>
                </p>
              </div>
            </div>
          </div>
          </div>
        </div>
    `;
  bookDetailsContent.innerHTML = html;
}
