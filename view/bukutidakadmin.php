<?php 
                    if($_SESSION['status']=="nonadm"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=buku-nonadm';
                        </script>

                        <?php
                  }                   
?>  
 <?php
            $sql= "select * from buku";
            $query = mysqli_query($koneksi, $sql);
            
?> 



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

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>KODE</th>
                      <th>JUMLAH</th>
                      <th>RAK</th>
                      <th>JUDUL</th>
                      <th>PENGARANG</th>
                      <th>PENERBIT</th>
                      <th>TGL MASUK</th>
                      <th>TERBIT</th>
                      
                    </tr>
                  </thead>
                   <tbody>
                    <?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td><?php echo $row['id_buku']; ?></td>
            <td><?php echo $row['kode_buku']; ?></td>
            <td><?php echo $row['jml_buku']; ?></td>
            <td><?php echo $row['rak']; ?><?php echo $row['abjad']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['pengarang']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['terbit']; ?></td>
            
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


