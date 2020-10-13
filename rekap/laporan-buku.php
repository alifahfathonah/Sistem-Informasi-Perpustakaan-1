<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : '';
            $delete = "delete from buku where id_buku='$id_buku' ";
            mysqli_query($koneksi, $delete);
            $sql= "select * from buku";
            $query = mysqli_query($koneksi, $sql);
            $no = 1;
?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="panel-heading" align="left">
                             <a href="fpdf/cetak_buku.php" target="blank" class="btn btn-success"><i class="fa fa-print"> CETAK</i></a>
    </div></br>                                         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA BUKU</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>KODE</th>
                      <th>JUDUL</th>
                      <th>PENGARANG</th>
                      <th>PENERBIT</th>
                      <th>JUMLAH</th>
                      <th>RAK</th>
                      <th>TGL MASUK</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['kode_buku']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['pengarang']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td><?php echo $row['jml_buku']; ?></td>
            <td><?php echo $row['rak']; ?><?php echo $row['abjad']; ?></td>
            <td><?php echo $row['date']; ?></td>
          </tr>
          <?php
          $no++;
}
?>
</tbody>
</table>
</div>
</div>
</div>