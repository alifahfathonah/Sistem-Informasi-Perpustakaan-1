<!-- <?php

    $id_transaksi = $_GET['id_transaksi'];
    $nis = $_GET['nis'];
    $id_user = $_GET['id_user'];

    $id = $_GET['id'];
    $buku = $_GET['buku'];
    $banyakdel = $_GET['jml'];

    $rownama = "select * from anggota where nis = '$nis'";
    $rowquery = mysql_query($rownama);
    $rows=mysql_fetch_array($rowquery);

    $selectdel = "SELECT jml_buku FROM buku WHERE id_buku = '$buku'";
    $queryselectdel = mysql_query($selectdel);
    $rowselectdel = mysql_fetch_row($queryselectdel);

    $tambah = $rowselectdel[0]+$banyakdel;
    $updatedel = "UPDATE `buku` SET `jml_buku` = '$tambah' WHERE `buku`.`id_buku` = '$buku'";
    mysql_query($updatedel);

    $delete = "delete from det_peminjaman where det_peminjaman.det_id_peminjaman = '$id'";
    mysql_query($delete);

    $tglp= date("Y-m-d");
    $tambah_tanggal = mktime(0,0,0,date('m')+0,date('d')+60,date('Y')+0);
    $tglk = date('Y-m-d',$tambah_tanggal);
?>  -->

  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DATA BUKU DIPINJAM</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="<?php echo $baseurlini; ?>/index.php?page=meminjam-buku&id_transaksi=<?php echo "$id_transaksi"; ?>&nis=<?php echo "$nis"; ?>&id_user=<?php echo "$id_user"; ?>" method="POST">

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                              <label>Nama</label>
                              <input id="nama" readonly="" class="form-control form-control-user" name="nama" value="<?php echo $rows[nama]; ?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                              <label>ID Buku</label>
                              <input onchange="isi_otomatis()" id="id_buku" class="form-control form-control-user" required="" name="id_buku">
                          </div>
                        </div>

                        <div class="form-group row">
                          	<div class="col-sm-6 mb-3 mb-sm-0">
                              <label>Judul Buku</label>
                              <input type="text" class="form-control form-control-user" required="" name="judul" id="judul">
                         	  </div>
                        </div>

                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label>Pengarang</label>
                              <input type="text" class="form-control form-control-user" required="" name="pengarang" id="pengarang">
                            </div>
                          </div>
                       
                       <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Tanggal Pinjam</label>
                                <input value="<?php echo "$tglp";?>" class="form-control form-control-user" readonly="" name="tgl_pinjam" id="tgl_pinjam" maxlength="50" width="10px">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Tanggal Kembali</label>
                                <input readonly="" value="<?php echo "$tglk";?>" class="form-control form-control-user" required="" name="tgl_kembali" id="tgl_kembali">
                          </div>
                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Daftar Koleksi Buku</button>
                        <input type="submit" class="btn btn-success" name="submit" value="Tambah">
                 </form><br>
                </div>

<div class="col-md-7">
<!--QRCODE Reader-->
    <div class="col-lg-7">
     
    <div class="panel panel-success">
    <div class="panel-heading" align="center">
        <i class="fa fa-qrcode"> SCAN QRCODE</i>
    </div>
    <div class="panel-body">
        <p><canvas></canvas></p>
    </div>
    <div class="panel-footer" align="center">
         
    </div>
    </div>
  
    </div>                                           
    </div>

    <!-- SQL Tambah Ke Tabel & Database-->
    <!-- <?php
            $id_buku = $_POST['id_buku'];
            $judul = mysql_real_escape_string($_POST['judul']);
            $jml = $_POST['jml'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];
            $status = $_POST['status'];
            $submit = $_POST['submit'];
            if ($submit) {
                $sqljmlbk = "select jml_buku from buku where id_buku = '$id_buku'";
                $queryjmlbk = mysql_query($sqljmlbk);
                $cekjmlbk = mysql_fetch_array($queryjmlbk);
                $jmlbk = $cekjmlbk['0']-$jml;
                    if ($jmlbk < '0') {
                        ?> -->
                            <!-- <script language script="JavaScript">
                            alert('Stok buku kosong');
                            document.location='?page=meminjam-buku&id_transaksi=<?php echo "$id_transaksi";?>&nis=<?php echo "$nis";?>&id_user=<?php echo "$id_user";?>';
                            </script>  -->  
                        <!-- <?php
                    }
                    else{
                        $sqlcek = "select * from det_peminjaman where id_buku = '$id_buku' and id_transaksi = '$id_transaksi' ";
                        $querycek = mysql_query($sqlcek);
                        $cek = mysql_fetch_array($querycek);
                        if ($cek[0]=='') {
                            $sqli="insert into det_peminjaman(id_buku,jml,judul,id_transaksi,tgl_pinjam,tgl_kembali,status) values ('$id_buku','$jml','$judul','$id_transaksi','$tgl_pinjam','$tgl_kembali','dipinjam')";
                        }
                        else{
                            $jml = $cek[1]+$jml;
                            $sqli = "UPDATE `det_peminjaman` SET 'jml'='$jml'  WHERE id_transaksi = '$id_transaksi' AND id_buku = '$id_buku'";
                            }
                mysql_query($sqli);

                $select = "select jml_buku from buku where id_buku = '$id_buku'";
                $queryselect = mysql_query($select);
                $rowselect = mysql_fetch_array($queryselect);
                $kurang = $rowselect[0]-$jml;
                $sqlu = "UPDATE `buku` SET `jml_buku` = '$kurang' WHERE `buku`.`id_buku` = '$id_buku'";
                mysql_query($sqlu);
                ?> -->
                            <!-- <script language script="JavaScript">
                            document.location='?page=meminjam-buku&id_transaksi=<?php echo "$id_transaksi";?>&nis=<?php echo "$nis";?>&id_user=<?php echo "$id_user";?>';
                            </script> -->   
                <!-- <?php
                        }
        }
           $sqlpinjam="SELECT det_peminjaman.det_id_peminjaman, buku.id_buku, buku.judul, buku.pengarang, jml FROM det_peminjaman, buku WHERE det_peminjaman.id_transaksi='$id_transaksi' AND det_peminjaman.id_buku=buku.id_buku";
           $queryp=mysql_query($sqlpinjam);
           
            
    ?> -->

<!-- <div class="panel-body">
<div class="table-responsive">

    <table class="table table-striped table-bordered table-hover"> -->
      <!-- <div class="card shadow mb-4"> -->
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DAFTAR BUKU YANG DIPINJAM</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <td>No</td>
                <td>ID Buku</td>
                <td>Judul</td>
                <td>Pengarang</td>
                <!-- <td>Jumlah</td> -->
                <td>Menu</td>
            </tr>
            <?php
            $no = 1;
            
            
                while($row=mysql_fetch_row($queryp)){
                    echo"
                    <tr>
                        <td>$no</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        
                        <td>
                        <a href='?page=meminjam-buku&id_transaksi=$id_transaksi&id=$row[0]&buku=$row[1]&jml=$row[4]' class='btn btn-danger btn-sm' title='Hapus'><i class='glyphicon glyphicon-trash'></i>
                        </a>
                        </td>
                    </tr>
                    ";
            $no++;
                    }
            ?>

</table> 
<?php
                error_reporting(E_ALL ^ E_NOTICE);
                $id_transaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : '';
                $sql= "select count(id_transaksi) from det_peminjaman where id_transaksi ='$id_transaksi'";
                $query = mysql_query($sql);
                $count = mysql_fetch_row($query); 
                echo "
                    <div class='col-md-5'>
                    <input type='submit' name='save' class='btn btn-success' id='save' value='Simpan'>
                    <!-- <a href='index.php?page=buku-dipinjam' type='submit' class='btn btn-default' name='save'>Simpan</a>
                    </div>
                        <div class='col-md-5'>
                        <tr>
                        <td><input type='hidden' id='Jumlahbk' readonly='readonly' value='$count[0]' class='form-control'>
                        </td>
                        </tr>
                        </div>";
            ?>
</div>
</div> 
</div>

      

           

            
                    
                                          
                            <!-- </div> -->
                        <!-- </div>
                        </div>
                    </div>
                

                <div class="panel-body">                 
                </div>
               </div>
         
            </div>
            </div> -->
<?php include "modal/cari-buku.php"; ?>

         
<!-- JS JS JS jS JS JS JS -->
<script src="assets/js/jquery.min.js"></script>
     <!-- Autofill ajax -->
    <script type="text/javascript">
        function isi_otomatis(){
            var id_buku = $("#id_buku").val();
            $.ajax({
                url: "<?php echo $baseurlini; ?>/transaksi/autofill.php",
                data:"id_buku="+id_buku ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#judul').val(obj.judul);
                $('#pengarang').val(obj.pengarang);
            });
        }

        function isi_dariqr(id_buku){
            $.ajax({
                url: "<?php echo $baseurlini; ?>/transaksi/autofill.php",
                data:"id_buku="+id_buku ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#id_buku').val(id_buku);
                $('#judul').val(obj.judul);
                $('#pengarang').val(obj.pengarang);
            });
        }
    </script>

    <!-- QRCODEREADER -->
    <script type="text/javascript" src="assets/webcodecamjs/js/filereader.js"></script>
    <script type="text/javascript" src="assets/webcodecamjs/js/qrcodelib.js"></script>
    <script type="text/javascript" src="assets/webcodecamjs/js/webcodecamjs.js"></script>
    <script type="text/javascript" src="assets/webcodecamjs/js/main.js"></script>
        <script type="text/javascript">
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                    // var aChild = document.createElement('id_buku');
                    var hasilqr = result.format + result.code;
                    // aChild[txt] = hasilqr;
                    // document.querySelector('form').appendChild(aChild);
                    // Isi form
                    isi_dariqr(hasilqr);
                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
        </script>

<script type="text/javascript">
$("#save").click(function(){
            var jumlah=parseInt($("#Jumlahbk").val(),10);
            
            if (jumlah=="0") {
                alert("Pilih Buku yang akan dipinjam");
                return false;
            }
            else if (jumlah=="4"){
                alert("Maksimal Buku yang dipinjam 3");
                return false;
            }
            else{
                alert("Transaksi Berhasil");
                document.location='?page=buku-dipinjam';
            }


            }
        )
         
</script>
<!-- <script type="text/javascript">
            function cekbk(){
            var id_buku = $("#cekbk").val();
            if ( $id_buku === $id_buku ) {
            hasDuplicate = true;
            alert("Buku Sudah ada.");
            return false;
        }else{
            return 0;
            }
        }

        
        
         
</script> -->