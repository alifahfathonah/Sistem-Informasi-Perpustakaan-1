
 <?php
   include 'function/transaksi.php';
   ?>


   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

   <div class="panel-heading" align="left">
                             <a href="?page=add-transaksi" class="btn btn-primary"><i class="fa fa-plus"> Tambah Transaksi</i></a>
    </div></br>
   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA TRANSAKSI</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>JUDUL BUKU</th>
                      <th>PEMINJAM</th>
                      <th>TGL PINJAM</th>
                      <th>TGL KEMBALI</th>
                      <th>TERLAMBAT</th>
                      <th>KEMBALIKAN</th>
                      <th>PERPANJANG</th>
                    </tr>

                    <?php 
                        $no = 1;
                        $sql= "SELECT id, transaksi.id_buku, buku.judul, anggota.nama, tgl_pinjam, tgl_kembali, status FROM transaksi JOIN buku ON buku.id_buku=transaksi.id_buku JOIN anggota ON anggota.nis=transaksi.id_anggota WHERE status='pinjam' ORDER BY tgl_pinjam DESC";
                        $query = mysqli_query($koneksi, $sql);

                        while ($row = mysqli_fetch_array($query)) { ?>
                            
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $row['judul']; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['tgl_pinjam']; ?></td>
                              <td><?php echo $row['tgl_kembali']; ?></td>
                              <td>
                                <?php
                                  $denda1 = 500;
                                  $tgl_dateline=$row['tgl_kembali'];
                                  $tgl_kembali=date('d-m-Y');
                                  $lambat=terlambat($tgl_dateline, $tgl_kembali);
                                  $denda=$lambat*$denda1;
                                  if ($lambat>0) {
                                    echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
                                  }
                                  else {
                                    echo $lambat." hari";
                                  }
                                ?>
                              </td>
                              <td>
                                <a href="?page=transaksi_proses_kembali&id=<?php echo $row['id']; ?>&buku=<?php echo $row['id_buku']; ?>">kembali</a>
                              </td>
                              <td>
                                <a href="?page=transaksi_proses_perpanjang&id=<?php echo $row['id']; ?>&buku=<?php echo $row['id_buku'];?>&tgl_kembali=<?php echo $row['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>">perpanjang</a>
                              </td>
                            </tr>


                        <?php $no++; }

                     ?>
                  </thead>
                </table>
              </div>

