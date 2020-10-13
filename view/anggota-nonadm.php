<?php 
                    if($_SESSION['status']=="admin"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=anggota-adm';
                        </script>

                        <?php
                  }                   
?>
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $nis = isset($_GET['nis']) ? $_GET['nis'] : '';
            $delete = "delete from anggota where nis='$nis' ";
            mysqli_query($koneksi, $delete);   
            $sql= "SELECT * from anggota ORDER BY anggota.nis";
            $query = mysqli_query($koneksi, $sql);
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA SISWA</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>NO</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <!-- <th>Alamat</th> -->
                      <th>Kelas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
    while($row=mysqli_fetch_array($query)){
       ?>  
        <tr>
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row['nis']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <!-- <td><?php echo $row['alamat']; ?></td> -->
            <td align="center"><?php echo $row['kelas']; ?></td>
        </tr>
    <?php $no++ ?>
<?php
}
?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>