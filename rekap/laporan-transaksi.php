<!-- <html>
<body>
  <script>
            window.print()

</script>
        <p align="center">LAPORAN DATA ANGGOTA PERPUSTAKAAN SMA MUHAMMADIYAH PK KARTASURA</p>
          <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px">
           
              <tr>
                <th width="5%"  align="center" bgcolor="#CCCCCC">No</th>
                <th width="30%" align="center" bgcolor="#CCCCCC">Judul Buku</th>
                <th width="19%" align="center" bgcolor="#CCCCCC">Peminjam</th>
                <th width="18%" align="center" bgcolor="#CCCCCC">Tgl Pinjam</th>
                <th width="18%" align="center" bgcolor="#CCCCCC">Tgl Kembali</th>
                <th width="10%" align="center" bgcolor="#CCCCCC">Status</th>
              </tr>
            <?php
                $query = "SELECT id, transaksi.id_buku, buku.judul, anggota.nama, tgl_pinjam, tgl_kembali, status FROM transaksi JOIN buku ON buku.id_buku=transaksi.id_buku JOIN anggota ON anggota.nis=transaksi.id_anggota WHERE status='pinjam'";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data=mysqli_fetch_array($sql)) {
            ?>
            <tbody>
              <tr>
                <td align="center"><?php echo $no; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td align="center"><?php echo $data['tgl_pinjam']; ?></td>
                <td align="center"><?php echo $data['tgl_kembali']; ?></td>  
                <td align="center"><?php echo $data['status']; ?></td>      
              </tr>    
            <?php $no++; } ?>
           
            </tbody>
          </table>

          <br>
<p align="right">&nbsp;</p>
<table width="100%">
  <tr>
    <td width="20%" height="132" rowspan="3">&nbsp;</td>
    <td width="50%" rowspan="3">&nbsp;</td>
    <td width="30%" height="30%"><h6>Surakarta, <?php echo date("d-m-Y"); ?><br>Kepala Perpustakaan</h6></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><h6><?php echo $_SESSION['nama_user']; ?><br>NIP. <?php echo $_SESSION['nip']; ?></h6>
    
    </td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<p align="right">&nbsp;</p>
</body>
</html> -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="panel-heading" align="left">
                             <a href="fpdf/cetak_transaksi.php" target="blank" class="btn btn-success"><i class="fa fa-print"> CETAK</i></a>
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
                      <th>STATUS</th>
                    </tr>
                    <?php
                $query = "SELECT id, transaksi.id_buku, buku.judul, anggota.nama, tgl_pinjam, tgl_kembali, status FROM transaksi JOIN buku ON buku.id_buku=transaksi.id_buku JOIN anggota ON anggota.nis=transaksi.id_anggota WHERE status='pinjam'";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data=mysqli_fetch_array($sql)) {
            ?>              
              <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tgl_pinjam']; ?></td>
                    <td><?php echo $data['tgl_kembali']; ?></td>
                    <td align="center"><?php echo $data['status']; ?></td>      
              </tr>    
            <?php $no++; } ?>
           
            </thead>
          </table>
        </div>