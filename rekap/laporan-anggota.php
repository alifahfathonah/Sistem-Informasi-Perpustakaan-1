<!-- <html>
<body>
<p align="center">LAPORAN DATA ANGGOTA PERPUSTAKAAN SMA MUHAMMADIYAH PK KARTASURA</p>
          <table width="100%" cellspacing="0" cellpadding="2" border="1px" align="center">
              <tr>
                <th width="5%" align="center" bgcolor="#CCCCCC">No</th>
                <th width="9%" align="center" bgcolor="#CCCCCC">Nis</th>
                <th width="20%" align="center" bgcolor="#CCCCCC">Nama</th>
                <th width="18%" align="center" bgcolor="#CCCCCC">Alamat</th>
                <th width="5%" align="center" bgcolor="#CCCCCC">Kelas</th>
                <th width="5%" align="center" bgcolor="#CCCCCC">Sub Kelas</th>
              </tr>
          
            <?php
        $query = "SELECT * FROM anggota ORDER by nis";
        $sql = mysqli_query($koneksi, $query);
        $total = mysqli_num_rows($sql);
        $no = 1;
        
        while ($data=mysqli_fetch_array($sql)) {
      ?>
            <tbody>
              <tr>
                <td align="center"><?php echo $no; ?></td>
                <td ><?php echo $data['nis']; ?></td>
                <td ><?php echo $data['nama']; ?></td>
                <td ><?php echo $data['alamat']; ?></td>
                <td align="center"><?php echo $data['kelas']; ?></td>
                <td align="center"><?php echo $data['sub_kelas']; ?></td>                
              </tr>
              
            <?php $no++; } ?>
            
            </tbody>
          </table>
          
</body>
</html>  -->
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $nis = isset($_GET['nis']) ? $_GET['nis'] : '';   
            $sql= "SELECT * from anggota ORDER BY anggota.nis";
            $query = mysqli_query($koneksi, $sql);
?>

<div>
            <a href="fpdf/cetak_anggota.php" target="_blank" class="btn btn-success"><i class="fa fa-print"> CETAK</i></a>
          </div><br>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA SISWA</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NISN</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Kelas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
    while($row=mysqli_fetch_array($query)){
       ?>    
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nis']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
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