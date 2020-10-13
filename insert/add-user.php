 <?php
    $sqlid = "SELECT MAX(user.id_user) FROM user";
    $queryc = mysqli_query($koneksi, $sqlid);
    $idus = mysqli_fetch_row($queryc);
    $cek = $idus;
    $angka = substr(strip_tags($cek[0]),1-3);
    $tambah = $angka+1;
    $kode=strlen($tambah);
    if(!$cek)
        { $no='00'; }
        elseif($kode==1)
        { $no='0'; }
        elseif($kode==2)
        { $no=''; }
    $newidus = 'U'.$no.$tambah;
?>
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
                <div>
                    <a href="?page=user-adm" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-backward"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                </div><br>

<!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h6>
                </div>
                <div class="card-body">
                     <form role="form" action="?page=add-user" method="POST">
                        
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>ID User</label>
                                <input readonly="" value="<?php echo "$newidus";?>" class="form-control form-control-user" required="" placeholder="ID User" name="id_user" id="id_user" maxlength="5">
                            </div>
                            <div class="col-sm-6">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control-user" name="nama_user" id="nama_user" maxlength="20" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Jadwal Jaga</label>
                                <select name="jadwal" id="jadwal" class="form-control form-control-user" required="">
                                                <option value="">--Pilih Salah Satu--</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jum'at">Jum'at</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Username</label>
                                <input type="text" class="form-control form-control-user" required="" name="username" id="username" maxlength="15">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Status</label>
                                <select name="status" required="" id="status" class="form-control form-control-user">
                                                    <option value="">--Pilih Salah Satu--</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="nonadm">Nonadm</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Password</label>
                                <input class="form-control form-control-user" type="password" name="password" id="password" maxlength="20" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <br>
                                <input type="submit" class="btn btn-primary" name="tambah" value="Tambahkan">
                                <button type="reset" class="btn btn-danger">Kosongkan</button>
                            </div>
                            <!-- <div class="col-sm-6">
                                <label>NIP</label>
                                <input class="form-control form-control-user" name="nip" id="nip" maxlength="50" required="">
                            </div> -->
                        </div>

                    </form>
                </div>
         <!-- /. Database  -->
<?php
if(isset($_POST['tambah'])){
    $id_user = $_POST['id_user'];
    $jadwal = $_POST['jadwal'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama_user = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
    $status = $_POST['status'];

    $query = "INSERT INTO user VALUES ('$id_user', '$status', '$jadwal', '$username', '$password', '$nama_user')";
    mysqli_query($koneksi, $query);

    if(mysqli_affected_rows($koneksi) > 0 ) {
        echo "<script language script='JavaScript'>
            alert('User Berhasil Ditambah');
            document.location='?page=user-adm';
            </script> ";
    } else {
        echo "<script language script='JavaScript'>
            alert('User Gagal Ditambah');
            document.location='?page=add-user';
            </script>";
        echo "<br>";
        echo mysqli_eror($koneksi);
    }
}
?>            


