<?php 
                    if($_SESSION['status']=="nonadm"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=user-nonadm';
                        </script>

                        <?php
                  }                   
?>  
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';
            $delete = "delete from user where id_user='$id_user'";
            mysqli_query($koneksi, $delete);
            $sql= "select * from user order by id_user";
            $query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
 <div>
            <a href="?page=add-user" class="btn btn-primary"><i class="fa fa-plus"> Tambah Pegawai</i></a>
          </div><br>
                
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Jadwal Jaga</th>
                      <th>Status</th>
                      
                      <!-- <th>Username</th>
                      <th>Password</th> -->
                      
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td align="center"><?php echo $row['id_user']; ?></td>
            <td><?php echo $row['nama_user']; ?></td>
            <td><?php echo $row['jadwal']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <!-- <td><?php echo $row['username']; ?></td> -->
            <!-- <td><?php echo $row['password']; ?></td> -->
            
            
            <td align="center">
                <a href='?page=edit-user&id_user=<?php echo $row['id_user']; ?>' class='btn btn-info btn-sm' title='Edit'><i class='fa fa-edit'></i></a> 
                <a href='?page=user-adm&id_user=<?php echo $row['id_user']; ?>' onclick='return confirm("Hapus <?php echo $row['id_user']; ?>?")' class='btn btn-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i></a>
            </td>
        </tr>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
