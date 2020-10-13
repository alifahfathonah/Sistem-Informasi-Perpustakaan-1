
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800"><a href="?page=add-buku" class="btn btn-primary"><i class="fa fa-plus"> Tambah Buku</i></a></h1>                                          
          </div><br>
          <?php 
                    if($_SESSION['status']=="nonadm"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=buku-nonadm';
                        </script>

                        <?php
                  }                   
?>  
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $id_buku = isset($_GET['id_buku']) ? $_GET['id_buku'] : '';
            $delete = "delete from buku where id_buku='$id_buku' ";
            mysqli_query($koneksi, $delete);
            $sql= "select * from buku";
            $query = mysqli_query($koneksi, $sql);
?> 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA BUKU</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="kotak" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>KODE</th>
                      <th>JUMLAH</th>
                      <th>RAK</th>
                      <th>JUDUL</th>
                      <th>PENGARANG</th>
                      <th>PENERBIT</th>
                      <th>TGL MASUK</th>
                      <th>TERBIT</th>
                      <th>MENU</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td><?php echo $row['id_buku']; ?></td>
            <td><?php echo $row['kode_buku']; ?></td>
            <td><?php echo $row['jml_buku']; ?></td>
            <td><?php echo $row['rak']; ?><?php echo $row['abjad']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['pengarang']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['terbit']; ?></td>
            <td>
                <a href='?page=edit-buku&id_buku=<?php echo $row['id_buku']; ?>' class='btn btn-info btn-sm' title='Edit'><i class='fa fa-edit'></i></a> 
                <a href='?page=buku-adm&id_buku=<?php echo $row['id_buku']; ?>' onclick='return confirm("Hapus <?php echo $row['id_buku']; ?>?")' class='btn btn-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i></a>
            </td>
        </tr>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
          