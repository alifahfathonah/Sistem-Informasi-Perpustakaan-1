<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->Image('at.png',18,3,38,38);
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(0,5,'LAPORAN SURAT BEBAS PERPUSTAKAAN','0','1','C');
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,7,'SMA MUHAMMADIYAH PK KARTASURA','0','1','C',false);
$pdf->SetFont('Times','i',14);
$pdf->Cell(0,4,'Alamat :  Jl. Slamet Riyadi No.80, Dusun II, Kartasura, Sukoharjo','0','1','C',false);
$pdf->Cell(0,7,'Kabupaten Sukoharjo, Jawa Tengah 57167','0','1','C',false);
$pdf->Ln(8);
$pdf->Cell(280,0.6,'','0','1','C',true);
$pdf->Ln(5);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,0,'',0,1);

require "../koneksi/koneksi1.php";
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED); 
  session_start();
  $nama_user = $_SESSION[''];
  $nip = $_SESSION[''];

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
$pdf->SetFont('Times','U',14);
$pdf->Cell(0,6,'SURAT KETERANGAN BEBAS PERPUSTAKAAN','0','1','C');
$pdf->SetFont('Times','',14);
$pdf->Cell(0,6,'NOMOR : ..../PERPUS SMA.M.PK.10/V/','0','1','C');
$pdf->Cell(0,15,'Assalamualaikum Warahmatullahi Wabarakatuh.','0','1','L');
$pdf->Cell(0,0,'Bersama ini kami nyatakan bahwa :','0','1','L');
$pdf->SetFont('Times','U','B',14);
$pdf->Cell(0,15,$row['nama'] ,'0','1','L');
// $pdf->Cell(0,0,'NISN   :','0','1','L');
// $pdf->Cell(0,15,'Kelas   :','0','1','L');
$pdf->SetFont('Times','',14);
$pdf->Cell(0,0,'Nama tersebut di atas benar-benar telah bebas pinjam buku perpustakaan, Demikian surat keterangan ini kami terbitkan untuk dapat  ','0','1','L');
$pdf->Cell(0,15,'dipergunakan sebagaimana mestinya.','0','1','L');
$pdf->Cell(0,0,'Wassalamualaikum Warahmatullahi Wabarakatuh.','0','1','L');

// $buku = mysqli_query($koneksi, "select * from buku");
// while ($row = mysqli_fetch_array($buku))

$pdf->SetFont('Times','B',12);
$pdf->Cell( 0, 40, 'Mengetahui,               ', 0, 0, 'R' );
 $pdf->Cell( 0, 85, 'Kepala Perpustakaan', 0, 0, 'R' );

$pdf->Output();
?>