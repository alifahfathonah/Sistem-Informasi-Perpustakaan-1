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
        $update=$_GET['id_user'];
        $sql="SELECT * FROM `user` WHERE `id_user` = '$update' ";
        $query=mysqli_query($koneksi, $sql);
        $row=mysqli_fetch_array($query);
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
                     <form role="form" action="?page=edit-user&id_user=<?php echo $update; ?>" method="POST">
                        
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>ID User</label>
                                <input readonly="" class="form-control form-control-user" required="" value="<?php echo $row['id_user']; ?>" name="id_user" id="id_user">
                            </div>
                            <div class="col-sm-6">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control-user" required="" value="<?php echo $row['nama_user']; ?>" name="nama_user" id="nama_user">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Jadwal Jaga</label>
                                <select name="jadwal" id="jadwal" class="form-control form-control-user" required="" value="<?php echo $row['jadwal']; ?>">
                                                <option"<?php echo $row['jadwal']; ?>"</option>
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
                                <input type="text" class="form-control form-control-user" required="" value="<?php echo $row['username']; ?>" name="username" id="username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Status</label>
                                <select name="status" required="" id="status" class="form-control form-control-user">
                                                    <option value="<?php echo $row['status']; ?>">--Pilih Salah Satu--</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="nonadm">Nonadm</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Password</label>
                                <input class="form-control form-control-user" required="" value="<?php echo $row['password']; ?>" type="" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <br>
                                <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                            </div>
                            <!-- <div class="col-sm-6">
                                <label>NIP</label>
                                <input class="form-control form-control-user" nname="nip" id="nip" maxlength="50" required="" value="<?php echo $row['nip']; ?>">
                            </div> -->
                        </div>

                    </form>
                </div>

<?php
    if(isset($_POST['edit'])) {
        $id_user = $_POST['id_user'];
        $jadwal = mysqli_real_escape_string($koneksi, $_POST['jadwal']);
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = $_POST['password'];
        $nama_user = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
        $status = $_POST['status']; 

        $query = "UPDATE user SET id_user = '$id_user', jadwal = '$jadwal', username = '$username', password = '$password', nama_user = '$nama_user', status = '$status' WHERE id_user = '$id_user'";
        mysqli_query($koneksi, $query);
        if(mysqli_affected_rows($koneksi) > 0){
            echo "<script language script='JavaScript'>
            alert('Pegawai Berhasil Diubah');
            document.location='?page=user-adm';
            </script> ";
        }else{
            echo "<script language script='JavaScript'>
            alert('anggota Gagal Diubah');
            document.location='?page=edit-user';
            </script>";
            echo "<br>";
            echo mysqli_eror($koneksi);
        }
    }
?>