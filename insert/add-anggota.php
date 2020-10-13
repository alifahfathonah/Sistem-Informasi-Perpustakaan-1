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
                    <a href="?page=anggota-adm" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-backward"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                </div><br>

                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Daftar Siswa</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="?page=add-anggota" method="POST">
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>NISN</label>
                            <input class="form-control form-control-user" name="nis" id="nis" maxlength="10" required="">
                          </div>
                          <div class="col-sm-6">
                            <label>Nama</label>
                            <input class="form-control form-control-user" name="nama" id="nama" maxlength="50" required="">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Kelas</label>
                            <input class="form-control form-control-user" name="kelas" id="kelas" maxlength="10"required="">
                            <!-- <select name="kelas" id="kelas" class="form-control form-control-user" required="">
                                                    <option value="">--Pilih Salah Satu--</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select> -->
                          </div>
                          <div class="col-sm-6">
                            <label>NO HP</label>
                            <input class="form-control form-control-user" name="no" id="no" maxlength="30" required="">
                            <!-- <label>Sub Kelas</label>
                            <select name="sub_kelas" id="sub_kelas" class="form-control form-control-user" required="">
                                                    <option value="">--Pilih Salah Satu--</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                </select> -->
                          
                        </div>

                        <!-- <div class="form-group row"> -->
                        </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                             <input type="submit" class="btn btn-primary" name="submit" value="Tambahkan">
                            <button type="reset" class="btn btn-danger">Kosongkan</button>
                            <!-- <label>Alamat</label>
                            <textarea class="form-control form-control-user" name="alamat" id="alamat" maxlength="30" required=""></textarea> -->
                          </div>
                          <div class="col-sm-6">
                          	<br>
                          	<br>
                          	<br>
                          </div>
                        <!-- </div> -->
                    </form>
                </div>
         <!-- /. Database  -->
<?php
  if(isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelas = $_POST['kelas'];
    $no = $_POST['no'];
    $sql ="INSERT INTO anggota VALUES ('$nis', '$nama', '$kelas', '$no')";
    mysqli_query($koneksi, $sql);

    if(mysqli_affected_rows($koneksi) > 0 ) {
      echo "<script language script='JavaScript'>
            alert('Anggota Berhasil Ditambah');
            document.location='?page=anggota-adm';
            </script> ";
    }else{
      echo "<script language script='JavaScript'>
            alert('Anggota Gagal Ditambah');
            document.location='?page=add-anggota';
            </script>";
        echo "<br>";
        echo mysqli_eror($koneksi);
    }
  }     
?>