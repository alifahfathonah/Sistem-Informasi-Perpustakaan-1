<?php
$pinjam         = date("d-m-Y");
$tuju_hari      = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali        = date("d-m-Y", $tuju_hari);
?>

    <div>
        <a href="?page=transaksi" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                      <i class="fa fa-backward"></i>
                    </span>
            <span class="text">Back</span>
        </a>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA BUKU DIPINJAM</h6>
        </div>

        <div class="card-body">
            <!-- <form role="form" action="?page=transaksi_proses" method="POST">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Judul Buku</label>
                        <select class="form-control" name="buku">
                            <option value="">Pilih Judul Buku</option>
                            <?php
                                    $query = "SELECT * FROM buku WHERE jml_buku > 0 ORDER by id_buku";
                                    $sql = mysqli_query($koneksi, $query);
                                    while ($buku=mysqli_fetch_array($sql)) {
                                    echo "<option value='$buku[id_buku]'>$buku[judul]</option>";
                                    }
                                  ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nama</label>
                        <select class="form-control" name="peminjam">
                            <option value="">Pilih Nama</option>
                            <?php
                                    $query = "SELECT * FROM anggota ORDER by nis";
                                    $sql = mysqli_query($koneksi, $query);
                                    while ($anggota=mysqli_fetch_array($sql)) {
                                    echo "<option value='$anggota[nis]'>$anggota[nama]</option>";
                                    }
                                  ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tanggal Pinjam</label>
                        <input value="<?php echo $pinjam; ?>" class="form-control form-control-user" readonly="" name="tgl_pinjam" id="tgl_pinjam" maxlength="50" width="10px">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tanggal Kembali</label>
                        <input readonly="" value="<?php echo $kembali; ?>" class="form-control form-control-user" required="" name="tgl_kembali" id="tgl_kembali">
                    </div>
                </div>
                <input type="submit" class="btn btn-success" name="submit" value="Tambah">
            </form> -->

            <div class="row">
                <div class="col-sm-6">
                    <form role="form" action="?page=transaksi_proses" method="POST">
                        <div class="form-group">
                            <label>ID Buku</label>
                                            <input onchange="isi_otomatis()" id="id_buku" placeholder="ID Buku" class="form-control" required="" name="buku">
                                        
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                             <input type="text" placeholder="Judul Buku" class="form-control" required="" name="judul" id="judul">
                        <!-- <select class="form-control" name="buku">
                            <option value="">Pilih Judul Buku</option>
                            <?php
                                    $query = "SELECT * FROM buku WHERE jml_buku > 0 ORDER by id_buku";
                                    $sql = mysqli_query($koneksi, $query);
                                    while ($buku=mysqli_fetch_array($sql)) {
                                    echo "<option value='$buku[id_buku]'>$buku[judul]</option>";
                                    }
                                  ?>
                        </select> -->
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                                            <input type="text" placeholder="Pengarang" class="form-control" required="" name="pengarang" id="pengarang">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                        <select class="form-control" name="peminjam">
                            <option value="">Pilih Nama</option>
                            <?php
                                    $query = "SELECT * FROM anggota ORDER by nis";
                                    $sql = mysqli_query($koneksi, $query);
                                    while ($anggota=mysqli_fetch_array($sql)) {
                                    echo "<option value='$anggota[nis]'>$anggota[nama]</option>";
                                    }
                                  ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                        <input value="<?php echo $pinjam; ?>" class="form-control form-control-user" readonly="" name="tgl_pinjam" id="tgl_pinjam" maxlength="50" width="10px">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                        <input readonly="" value="<?php echo $kembali; ?>" class="form-control form-control-user" required="" name="tgl_kembali" id="tgl_kembali">
                        </div>
                        <input type="submit" class="btn btn-success" name="submit" value="Tambah">
                    </form>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" style="margin-left: 80px; margin-top: 20px">
                        <!-- <label>Scan QrCode</label> -->
                        <canvas></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="form-group row"> -->
            <!-- <div class="col-sm-6 offset-6"> -->
                <!-- <div class="panel panel-success"> -->
                    <!-- <div class="panel-heading" align="center">
                        <i class="fa fa-qrcode"> SCAN QRCODE</i>
                    </div> -->
                    <!-- <div class="panel-body"> -->
                        <!-- <p> -->
                            <!-- <label>SCAN QRCODE</label> -->
                            <!-- <canvas></canvas> -->
                        <!-- </p> -->
                    <!-- </div> -->
                    <!-- <div class="panel-footer" align="center">

                    </div> -->
                <!-- </div> -->
            <!-- </div> -->

            <script src="assets/js/jquery.min.js"></script>
            <script type="text/javascript">
                function isi_otomatis() {
                    var id_buku = $("#id_buku").val();
                    $.ajax({
                        url: "<?php echo $baseurlini; ?>/transaksi/autofill.php",
                        data: "id_buku=" + id_buku,
                        success: function(data) {
                        var json = data,
                            obj = JSON.parse(json);
                        $('#judul').val(obj.judul);
                        $('#pengarang').val(obj.pengarang);
                    }
                })
                }

                function isi_dariqr(id_buku) {
                    $.ajax({
                        url: "<?php echo $baseurlini; ?>/transaksi/autofill.php",
                        data: "id_buku=" + id_buku,
                        success:function(data) {
                            console.log(data)
                        var json = data,
                            obj = JSON.parse(json);
                        $('#id_buku').val(id_buku);
                        $('#judul').val(obj.judul);
                        $('#pengarang').val(obj.pengarang);
                    }
                })
            }
            </script>
            <script type="text/javascript" src="assets/webcodecamjs/js/filereader.js"></script>
            <script type="text/javascript" src="assets/webcodecamjs/js/qrcodelib.js"></script>
            <script type="text/javascript" src="assets/webcodecamjs/js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="assets/webcodecamjs/js/webcodecamjs.js"></script>
            <script type="text/javascript" src="assets/webcodecamjs/js/main.js"></script>
            <script type="text/javascript">
                var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
                var arg = {
                    resultFunction: function(result) {
                        console.log(result)
                        // var aChild = document.createElement('id_buku');
                        var hasilqr = result.code;
                        // aChild[txt] = hasilqr;
                        // document.querySelector('form').appendChild(aChild);
                        // Isi form
                        isi_dariqr(hasilqr);
                    }
                };
                new WebCodeCamJS("canvas").init(arg).play();
            </script>

            <script type="text/javascript">
                $("#save").click(function() {
                    var jumlah = parseInt($("#Jumlahbk").val(), 10);

                    if (jumlah == "0") {
                        alert("Pilih Buku yang akan dipinjam");
                        return false;
                    } else if (jumlah == "4") {
                        alert("Maksimal Buku yang dipinjam 3");
                        return false;
                    } else {
                        alert("Transaksi Berhasil");
                        document.location = '?page=buku-dipinjam';
                    }

                })
            </script>