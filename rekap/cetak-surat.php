<html>
<head>
 <?php
  require "../koneksi/koneksi1.php";
  error_reporting(E_ALL^E_NOTICE^E_DEPRECATED); 
  session_start();
  $nama_user = $_SESSION[''];
  $nip = $_SESSION[''];
?>
 <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $id=$_GET['id'];

        $query2=mysqli_query($koneksi, "SELECT * FROM `transaksi` WHERE `id_anggota` = '$id' AND `status` = 'pinjam' ");
        $data = mysqli_num_rows($query2);

        if($data !== 0) {
          die("<script>alert('Tidak Dapat Mencetak');window.location.href='http://localhost/admin/dashborad1.php?page=anggota-adm';</script>");
        }
        
        $sql="SELECT * FROM `anggota` WHERE `nis` = '$id' ";
        $query=mysqli_query($koneksi, $sql);
        $row=mysqli_fetch_array($query);
    ?>         
<!--   <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
    <title align="center">Surat Keterangan Bebas Perpustakan</title>
    <style type="text/css">
h1 {
                text-align:center;
                font-size:16px;
            }
h2 {
                text-align:center;
                font-size:15px;
            }
h3 {
                text-align:center;
                font-size:14px;
            }
h4 {
                text-align:center;
                font-size:12px;
            }
h5 {
                text-align:center;
                font-size:11px;
            }
h6 {
                text-align:left;
                font-size:12px;
            }
table {
font-size:11px;
border-collapse: collapse;
}
.atas {
background-color:#CCCCCC;
}
th, td {
padding: 4px 2px;
}
th, tfoot tr td {
background-color: #999999;
}
</style>
    
</head>
<body>
  <br>
<!-- <table width="100%" height="113">
<tr>
    <td width="20%" height="107" align="center"><img src="../assets/img/header_laporan_smp.png" width="100%" height="100%"></td>
    <td width="60%" align="center" valign="top">
      <h4 align="center">MAJELIS PENDIDIKAN DASAR DAN MENENGAH<br>PIMPINAN DAERAH MUHAMMADIYAH KOTA SURAKARTA<br>SEKOLAH MENENGAH PERTAMA MUHAMMADIYAH 10 SURAKARTA</h4>
      <h5 align="center">NSS : <br>Alamat : Karangasem RT. 02 RW. 03, Laweyan, Surakarta Tlp. (0271)  Surakarta. 57145</h5>
    </td>
    <td width="20%" align="center">
    <p>
      <h2>&nbsp;</h2>
    </p>
    </td>
</tr>
</table> -->
<!-- <hr> -->

  <h3 align="center"><u>SURAT KETERANGAN BEBAS PERPUSTAKAAN</u><br>NOMOR : ..../PERPUS SMA.M.PK.10/V/<?php echo date("Y"); ?></h3>

  <p>Assalamu'alaikum Warahmatullahi Wabarakatuh.</p>
  <p>Bersama ini kami nyatakan bahwa :</p>
  <p>Nama  : <?php echo $row['nama']; ?><br>
  NISN   : <?php echo $row['nis']; ?><br>
  Kelas   : <?php echo $row['kelas']; ?></p>

  <p>Nama tersebut di atas benar-benar telah bebas pinjam buku perpustakaan.<br>
  Demikian surat keterangan ini kami terbitkan untuk dapat dipergunakan sebagaimana mestinya.<br></p>
  <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
  

 
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
    <td height="30"><h6><u><?php echo $_SESSION['nama_user']; ?></u><br>NIP. <?php echo $_SESSION['nip']; ?></h6>
    
    </td>
  </tr>
</table>
<br>

</body>
</html>
<script>
            window.print()

</script>
