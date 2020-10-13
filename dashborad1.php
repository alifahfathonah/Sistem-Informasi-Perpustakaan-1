<!DOCTYPE html>
<html lang="en">
<?php
  include "koneksi/koneksi1.php";
  $baseurlini = "http://localhost/perpustakaan";
  error_reporting(E_ALL^E_NOTICE^E_DEPRECATED); 
  session_start();
  // $status = $_SESSION[''];
  // $id_user = $_SESSION[''];
  // $nama_user = $_SESSION[''];
  if($_SESSION['username']==""){
?>
    <script language script="JavaScript">
          document.location='login.php';
    </script> 
<?php
  };
  $page = $_GET['page'];
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PERPUSTAKAAN</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- MENUUUUU -->
    <?php 
                    if($_SESSION['status']=="admin"){
                      include'menu/admin.php';
                    }
                    elseif ($_SESSION['status']=="nonadm") {
                      include'menu/nonadm.php';
                    }
                    else {
                      ?>
                        <script language script="JavaScript">
                            document.location='login.php';
                        </script>
                      <?php
                    }
        ?>  
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['status']; ?></span>
                <img class="img-profile rounded-circle" src="admin1.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php">
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php
                    switch($page)
                    {
                      case "": include'view/home.php'; break;
                      case "error": include'view/error.php'; break;
                        // View Admin //
                        // Buku
                      case "buku-adm": include'view/buku.php'; break;
                      case "add-buku": include'insert/add-buku.php'; break;
                      case "edit-buku": include'edit/edit-buku.php'; break;
                        // User 
                      case "user-adm": include'view/user.php'; break;
                      case "add-user": include'insert/add-user.php'; break;
                      case "edit-user": include'edit/edit-user.php'; break;
                        // Anggota 
                      case "anggota-adm": include'view/anggota.php'; break;
                      case "add-anggota": include'insert/add-anggota.php'; break;
                      case "edit-anggota": include'edit/edit-anggota.php'; break;
                      // case "cetak-surat": include'rekap/cetak-surat.php'; break;
                      // case "anggota2-adm": include'view/anggota2-adm.php'; break;
                      // case "anggota3-adm": include'view/anggota3-adm.php'; break;
                      
                        // View Petugas //
                        // Menu
                      case "buku-nonadm": include'view/buku-nonadm.php'; break;
                      case "user-nonadm": include'view/user-nonadm.php'; break;
                      case "anggota-nonadm": include'view/anggota-nonadm.php'; break;
                        // Anggota
                      // case "anggota1-nonadm": include'view/anggota1-nonadm.php'; break;
                      // case "anggota2-nonadm": include'view/anggota2-nonadm.php'; break;
                      // case "anggota3-nonadm": include'view/anggota3-nonadm.php'; break;
                        // Transaksi
                      case "transaksi": include'transaksi/transaksi.php'; break;
                      case "transaksi_proses_kembali": include'transaksi/transaksi_proses_kembali.php'; break;
                      case "transaksi_proses_perpanjang": include'transaksi/transaksi_proses_perpanjang.php'; break;
                      case "add-transaksi": include'transaksi/add-transaksi.php'; break;
                      case "transaksi_proses": include'transaksi/transaksi_proses.php'; break;
                      // Rekap data
                      case "laporan-transaksi": include'rekap/laporan-transaksi.php'; break;
                      case "laporan-buku": include'rekap/laporan-buku.php'; break;
                      case "laporan-anggota": include'rekap/laporan-anggota.php'; break;
                      }

                     ?>

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

  <!-- Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

    <!-- <script type="text/javascript" src="assets\qrcodegen\jquery.min.js"></script> -->
    <script type="text/javascript" src="assets\qrcodegen\qrcode.js"></script>
    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
        width : 150,
        height : 150
        });

        function makeCode () {      
        var elText = document.getElementById("id_buku");
        
        qrcode.makeCode(elText.value);
        }
        makeCode();
        $("#id_buku").on("blur", function () {
            makeCode();
        }).on("keydown", function (e) {
        if (e.keyCode == 13) {
            makeCode();
        }
        });
    </script>

</body>

</html>
