 <?php
    $sqlid = "SELECT MAX(buku.id_buku) FROM buku";
    $queryc = mysqli_query($koneksi, $sqlid);
    $idbk = mysqli_fetch_row($queryc);
    $cek = $idbk;
    $angka = substr(strip_tags($cek[0]),1);
    $tambah = $angka+1;
    $kode=strlen($tambah);
    if(!$cek)
        { $no='0000000'; }
        elseif($kode==1)
        { $no='000000'; }
        elseif($kode==2)
        { $no='00000'; }
        elseif($kode==3)
        { $no='0000'; }
        elseif($kode==4)
        { $no='000'; }
        elseif($kode==5)
        { $no='00'; }
        elseif($kode==6)
        { $no='0'; }
        elseif($kode==7)
        { $no=''; }
    $newidbk = 'B'.$no.$tambah;
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
                    <a href="?page=buku-adm" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fa fa-backward"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                </div><br>


<!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Koleksi Buku</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="?page=add-buku" method="POST">
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>ID Buku</label>
                            <input readonly="" value="<?php echo "$newidbk";?>" class="form-control form-control-user" required="" name="id_buku" id="id_buku" maxlength="15" size="15">
                          </div>
                          <div class="col-sm-6">
                            <label>Pengarang</label>
                            <input input type="text" class="form-control form-control-user" required="" name="pengarang" id="pengarang" width="10px">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>ISBN</label>
                            <input type="text" class="form-control form-control-user" required="" name="kode_buku" id="kode_buku" size="10">
                          </div>
                          <div class="col-sm-6">
                            <label>Penerbit</label>
                            <input type="text" class="form-control form-control-user" required="" name="penerbit" id="penerbit">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Jumlah Buku</label>
                            <input input type="number" class="form-control form-control-user" required="" name="jml_buku" id="jml_buku" maxlength="50">
                          </div>
                          <div class="col-sm-6">
                            <label>Tanggal Masuk Buku</label>
                            <input type="date" class="form-control form-control-user" id="date" required="" name="date" placeholder="YYYY/MM/DD">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>No</label>
                                    <input type="number" min="0"  class="form-control form-control-user" required="" name="rak" id="rak" maxlength="1" size="1">
                                </div>
                                <div class="col-sm-6">
                                    <label>Rak Buku</label>
                                    <select name="abjad" required="" id="abjad" class="form-control form-control-user">
                                        <option value="">--Pilih Salah Satu--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                        <option value="J">J</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="N">N</option>
                                        <option value="O">O</option>
                                        <option value="P">P</option>
                                        <option value="Q">Q</option>
                                        <option value="R">R</option>
                                        <option value="S">S</option>
                                        <option value="T">T</option>
                                        <option value="U">U</option>
                                        <option value="V">V</option>
                                        <option value="W">W</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Tahun Terbit</label>
                            <input min="0" type="number" class="form-control form-control-user" id="terbit" required="" name="terbit">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Judul Buku</label>
                            <textarea class="form-control form-control-user" required="" name="judul" id="judul"></textarea>
                          </div>
                          <div class="col-sm-6">
                            <label>QR Code</label>
                                <div id="qrcode" style="width:150px; height:150px;"></div>
                                <span>Klik Kanan lalu pilih save image as <br>untuk menyimpan QRCODE.</span>
                          </div>
                        </div>


                        <input type="submit" class="btn btn-primary" name="submit" value="Tambahkan">
                        <button type="reset" class="btn btn-danger">Kosongkan</button>
                        

                    </form>
                </div>
              </div>

 <!-- /. Database  -->
<?php
    if(isset($_POST['submit'])) {
        $id_buku = $_POST['id_buku'];
        $kode_buku = $_POST['kode_buku'];
        $jml_buku = $_POST['jml_buku'];
        $rak = $_POST['rak'];
        $abjad= $_POST['abjad'];
        $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
        $pengarang = mysqli_real_escape_string($koneksi, $_POST['pengarang']);
        $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
        $date = $_POST['date'];
        $terbit = $_POST['terbit'];

        $sql="INSERT INTO buku VALUES ('$id_buku','$kode_buku','$jml_buku','$rak','$abjad','$judul','$pengarang','$penerbit','$date','$terbit')";
        mysqli_query($koneksi, $sql);

        if(mysqli_affected_rows($koneksi) > 0) {
            echo "<script language script='JavaScript'>
            alert('Buku Berhasil Ditambah');
            document.location='?page=buku-adm';
            </script> ";
        }else{
             echo "<script language script='JavaScript'>
            alert('Buku Gagal Ditambah');
            document.location='?page=add-buku';
            </script>";
            echo "<br>";
            echo mysqli_eror($koneksi);
        }
    }              
?>