<div class="panel-heading" align="left">
                             <a href="?page=add-anggota" class="btn btn-primary"><i class="fa fa-plus"> Tambah Siswa</i></a>
                             <div class="btn-group">
                                              <button data-toggle="dropdown" class="btn btn-success dropdown-toggle"><i class="fa fa-users" > Kelas</i> <span class="caret"></span></button>
                                              <ul class="dropdown-menu">
                                                <li><a href="?page=anggota-adm">Semua Kelas</a></li>
                                                <li><a href="?page=anggota1-adm">Kelas 7</a></li>
                                                <li><a href="?page=anggota2-adm">Kelas 8</a></li>
                                                <li><a href="?page=anggota3-adm">Kelas 9</a></li>
                                              </ul>
                            </div>              
                                   
          </div><br>
<?php 
                    if($_SESSION['status']=="nonadm"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=anggota-nonadm';
                        </script>

                        <?php
                  }                   
?>  
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $nis = isset($_GET['nis']) ? $_GET['nis'] : '';
            $delete = "delete from anggota where nis='$nis' ";
            mysqli_query($koneksi, $delete);   
            $sql= "SELECT * from anggota ORDER BY anggota.nis";
            $query = mysqli_query($koneksi, $sql);
?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA SISWA</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="kotak" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NISN</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Kelas</th>
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
    while($row=mysqli_fetch_array($query)){
       ?>    
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nis']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td>
              <a href='?page=edit-anggota&nis=<?php echo $row['nis']; ?>' class='btn btn-info btn-sm' title='Edit'><i class='fa fa-edit'></i></a> 
                <a href='?page=anggota-adm&nis=<?php echo $row['nis']; ?>' onclick="return confirm('Hapus <?php echo $row['nama']; ?>?')" class='btn btn-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i></a>
            </td>
        </tr>
    <?php $no++ ?>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 