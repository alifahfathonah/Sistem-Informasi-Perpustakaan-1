<?php
include "../koneksi/koneksi1.php";
$id_buku = $_REQUEST['id_buku'];
$query = mysqli_query($koneksi, "select * from buku where id_buku='$id_buku'");
$buku = mysqli_fetch_array($query);
$data = array(
            'judul'      	=>  $buku['judul'],
            'pengarang'    	=>  $buku['pengarang'],);
 echo json_encode($data);
?>