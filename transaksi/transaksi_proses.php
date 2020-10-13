<?php

$tgl_pinjam		= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : "";
$tgl_kembali	= isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : "";

$id_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";

$id_anggota		= isset($_POST['peminjam']) ? $_POST['peminjam'] : "";

if($id_buku == "") {
	echo "<script>alert('Pilih bukunya terlebih dahulu');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=add-transaksi'>";
} elseif ($id_anggota == "") {
	echo "<script>alert('Pilih peminjamnya terlebih dahulu');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=add-transaksi'>";
	
} else {

	$sql= "select count(id_anggota) from transaksi where id_anggota='$id_anggota' and status='pinjam'";
    $query = mysqli_query($koneksi, $sql);
    $count = mysqli_fetch_row($query); 
    $jumlah = $count[0];
    if ($jumlah >= 3) {
    	echo "<script>alert('user telah melakukan 3 kali peminjaman');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=add-transaksi'>";
    }
	$qt = mysqli_query($koneksi, "INSERT INTO transaksi (id_anggota, id_buku, tgl_pinjam, tgl_kembali, status) VALUES ('$id_anggota','$id_buku', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") or die ("Gagal Masuk".mysql_error());
		$qu	= mysqli_query($koneksi, "UPDATE buku SET jml_buku=(jml_buku-1) WHERE id_buku='$id_buku'");		
		if ($qt&&$qu) {
	        echo "<script>alert('Transaksi Sukses');</script>";
	        	echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		} else {
			echo "<script>alert('Transaksi Gagal');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
	
		}
}
?>
