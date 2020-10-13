<?php
include "koneksi/koneksi1.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PERPUSTAKAAN</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="bg-white">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gray topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
    
          
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            
            <a href="login.php"><input type="submit" name="login" id="submit" class='btn btn-primary btn-user btn-block' value="Login" size="5" /></a>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <img src="smam1.png" width="20%" height="20%">
          <div class="row fullscreen d-flex align-items-center justify-content-center">
        <div class="banner-content col-lg-6 col-md-12">
          <h3 class= "text-center wow fadeIn" data-wow-duration="4s">SELAMAT DATANG DI PERPUSTAKAAN</br></h3>
          <h3 class= "text-center wow fadeIn" data-wow-duration="4s">SMA MUHAMMADIYAH PK KARTASURA</br></h3>
          <p class="text-black">
            perpustakaan adalah sebagai tempat meningkatan kecerdasan kehidupan bangsa, perlu ditumbuhkan budaya gemar membaca melalui pengembangan dan pendayagunaan perpustakaan sebagai sumber informasi berupa karya tulis, karya cetak, dan karya rekam.
          </p>
        </div>
      </div>
          </div>
        </div>
          <div class="card-body bg-white">
                    <form action="" method="POST">
                        <div class="row fullscreen d-flex align-items-center justify-content-center">
                          <div class="banner-content col-lg-6 col-md-12">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." id="searchquery" name="query">
                          </div>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="cari" id="searchbutton">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                        </div>
                        
                      </form></br>

                      <?php
      if (isset($_POST['cari'])) {
        $search = mysqli_escape_string($koneksi, $_POST['query']);
        $sql = "SELECT * FROM buku WHERE (jml_buku not in (0)) AND (kode_buku LIKE '%$search%' OR judul LIKE '%$search%' OR pengarang LIKE '%$search%' OR rak LIKE '%$search%' OR abjad LIKE '%$search%')";
        $result = mysqli_query($koneksi, $sql);
        $num = mysqli_num_rows($result);
        ?>

            <div class="row fullscreen d-flex align-items-center justify-content-center bg-white">
              <h6 class="font-weight-bold text-black">HASIL PENCARIAN</h6>
            </div>
            <div class="row fullscreen d-flex align-items-center justify-content-center bg-white">
            <div class="card-body col-lg-10 card-header py-0 bg-white">
            <div class="card-body">
              <div class="table-responsive bg-white">
                <table class="table table-bordered" id="kotak" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ISBN</th>
                      <th>JUDUL</th>
                      <th>PENGARANG</th>
                      <th>TEMPAT BUKU</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
        if ($num > 0){
          while($row=mysqli_fetch_array($result)) {
            ?>
              
                <tr>
                  <td><?php echo $row['kode_buku']; ?></td>
                  <td><?php echo $row['judul']; ?></td>
                  <td><?php echo $row['pengarang']; ?></td>
                  <td><?php echo $row['rak']; ?><?php echo $row['abjad']; ?></td>
                </tr>
            <?php
          }
        }else {
          ?>
          <tr>
                  <h6>DATA TIDAK DITEMUKAN</h6>
          </tr>
          <?php
        }
      } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
                    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>

</html>
