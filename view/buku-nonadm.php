
<?php 
                    if($_SESSION['status']=="admin"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=buku-adm';
                        </script>

                        <?php
                  }                   
?>
 
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            
            $sql= "select * from buku";
            $query = mysqli_query($koneksi, $sql);
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA BUKU</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>ID</th>
                      <th>ISBN</th>
                      <th>JUDUL</th>
                      <th>PENGARANG</th>
                      <th>JUMLAH</th>
                      <th>RAK</th>
                      <!-- <th>PENERBIT</th> -->
                      <!-- <th>TGL MASUK</th> -->
                      <!-- <th>TERBIT</th> -->
                    </tr>
                  </thead>
                   <tbody>
                    <?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td><?php echo $row['id_buku']; ?></td>
            <td align="center"><?php echo $row['kode_buku']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['pengarang']; ?></td>
            <td align="center"><?php echo $row['jml_buku']; ?></td>
            <td align="center"><?php echo $row['rak']; ?><?php echo $row['abjad']; ?></td>
            <!-- <td><?php echo $row['penerbit']; ?></td> -->
            <!-- <td><?php echo $row['date']; ?></td> -->
            <!-- <td><?php echo $row['terbit']; ?></td> -->
        </tr>
<?php
}
?>
                  </tbody>
                </table>
		</div>
	</div>
</div>
