<?php

$id	=$_GET['id'];
$id_buku= $_GET['buku'];

$us=mysqli_query($koneksi, "UPDATE transaksi SET status='kembali' WHERE id='$id'")or die ("Gagal update".mysql_error());
$uj=mysqli_query($koneksi, "UPDATE buku SET jml_buku=(jml_buku+1) WHERE id_buku='$id_buku'")or die ("Gagal update".mysqli_error());

	if ($us || $uj) {
		echo "<script>alert('Berhasil Dikembalikan')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
	} else {
		echo "<script>alert('Gagal Dikembalikan')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
	}
?>