                 <!-- /. Error  -->
<?php 
                    if($_SESSION['status']=="nonadm"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=error';
                        </script>

                        <?php
                  }                   
?>  
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $update=$_GET['nis'];
        $sql="SELECT * FROM `anggota` WHERE `nis` = '$update' ";
        $query=mysqli_query($koneksi, $sql);
        $row=mysqli_fetch_array($query);
    ?>         

<div>
                    <a href="?page=anggota-adm" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-backward"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                </div><br>

                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Koleksi Buku</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="?page=edit-anggota&nis=<?php echo $update; ?>" method="POST">
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>NISN</label>
                            <input class="form-control form-control-user" required="" value="<?php echo $row['nis']; ?>" name="nis" id="nis">
                          </div>
                          <div class="col-sm-6">
                            <label>Nama</label>
                            <input class="form-control form-control-user" required="" value="<?php echo $row['nama']; ?>" name="nama" id="nama">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Kelas</label>
                            <input class="form-control form-control-user" name="kelas" id="kelas" maxlength="2"required="" value="<?php echo $row['kelas']; ?>">
                          </div>
                        <div class="col-sm-6">
                            <label>NO HP</label>
                            <input class="form-control form-control-user" required="" name="no" id="no" value="<?php echo $row['no']; ?>">
                          </div>
                          <div class="col-sm-6">
                            <br>
                            <br>
                            <br>
                            <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                          </div>
                      </div>
                    </form>
                </div>

<!-- /. Database  -->
<?php
  if(isset($_POST['edit'])) {
        $nis = $_GET['nis'];
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $no = mysqli_real_escape_string($koneksi, $_POST['no']);
        $kelas = $_POST['kelas'];
        $query = "UPDATE anggota SET nis = '$nis', nama = '$nama', no  = '$no', kelas = '$kelas' WHERE nis = '$nis'";
        mysqli_query($koneksi, $query);

        if(mysqli_affected_rows($koneksi) > 0 ) {
        echo "<script language script='JavaScript'>
            alert('anggota Berhasil Diubah');
            document.location='?page=anggota-adm';
            </script> ";
    } else {
        echo "<script language script='JavaScript'>
            alert('anggota Gagal Diubah');
            document.location='?page=anggota-adm';
            </script>";
        echo "<br>";
        echo mysqli_eror($koneksi);
}
}
    ?>