<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location:login/login.php?login=dulu");
}

include "koneksi/koneksi.php";

$sql = "SELECT*FROM post";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram</title>
  <link rel="shortcut icon" href="assets/Instagram-Icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/media-queries.css">
</head>

<body>

  <!-- Wrapper -->
  <div class="wrapper">

    <!-- Sidebar -->
    <nav class="sidebar">
      <!-- close sidebar menu -->

      <div class="logo">
        <h3><a href="#"></a></h3>
      </div>

      <ul class="list-unstyled menu-elements">
        <li class="active">
          <a class="scroll-link" href="#top-content"><i class="fas fa-home"></i> Beranda</a>
        </li>
        <li>
          <a class="scroll-link" href="#section-1"><i class="fas fa-search"></i> Cari</a>
        </li>
        <li>
          <a class="scroll-link" href="#section-2"><i class="fas fa-compass"></i> Jelajahi</a>
        </li>
        <li>
          <a class="scroll-link" href="#section-5"><i class="fas fa-sort"></i> Urutkan</a>
        </li>
        <li>
          <a class="scroll-link" href="#section-6"><i class="fas fa-plus-square"></i> Buat</a>
        </li>
        <li>
          <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
            <i class="fas fa-sync"></i> <?= $_SESSION["login"]; ?>
          </a>
          <ul class="collapse list-unstyled" id="otherSections">
            <li>
              <a class="scroll-link" href="#section-3">Edit Profil</a>
            </li>
            <li>
              <a class="scroll-link text-danger" href="#section-4">Logout</a>
            </li>
          </ul>
        </li>
      </ul>

      <div class="to-top">
        <a class="btn btn-primary btn-customized-3" href="#" role="button">
          <i class="fas fa-arrow-up"></i> Top
        </a>
      </div>

      <div class="dark-light-buttons">
        <a class="btn btn-primary btn-customized-4 btn-customized-dark" href="#" role="button">Dark</a>
        <a class="btn btn-primary btn-customized-4 btn-customized-light" href="#" role="button">Light</a>
      </div>
    </nav>
    <!-- End sidebar -->

  </div>
  <!-- End wrapper -->

  <br>

  <div class="container">

    <?php
    //Validasi untuk menampilkan pesan pemberitahuan
    if (isset($_GET['tambah'])) {

      if ($_GET['tambah'] == 'berhasil') {
        echo "<div class='alert alert-success'><strong>Berhasil!</strong> File gambar telah diupload!</div>";
      } else if ($_GET['tambah'] == 'gagal') {
        echo "<div class='alert alert-danger'><strong>Gagal!</strong> File gambar gagal diupload!</div>";
      }
    }

    if (isset($_GET['hapus'])) {

      if ($_GET['hapus'] == 'berhasil') {
        echo "<div class='alert alert-success'><strong>Berhasil!</strong> File gambar telah dihapus!</div>";
      } else if ($_GET['hapus'] == 'gagal') {
        echo "<div class='alert alert-danger'><strong>Gagal!</strong> File gambar gagal dihapus!</div>";
      }
    }
    ?>

    <div class="row justify-content-center">
      <div class="col-md-5">

        <h1>Daftar Postingan</h1>

        <br><br>

        <div class="card mb-3">
          <h3 class="card-header">Card header</h3>
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="300" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <image href="img/fzlfade.png " width="100%" height="180" />
            <!-- Ganti 'path_to_your_image.jpg' dengan path ke gambar asli yang ingin Anda tampilkan -->
          </svg>

          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Javascript -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/scripts.js"></script>


</body>

</html>