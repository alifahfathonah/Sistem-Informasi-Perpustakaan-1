
          <div>
            <a href="?page=add-user" class="btn btn-primary"><i class="fa fa-plus"> Tambah Pegawai</i></a>
          </div><br>
<?php 
                    if($_SESSION['status']=="nonadm"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=user-nonadm';
                        </script>

                        <?php
                  }                   
?>  
<?php
            error_reporting(E_ALL ^ E_NOTICE);
            $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : '';
            $delete = "delete from user where id_user='$id_user'";
            mysqli_query($koneksi, $delete);
            $sql= "select * from user order by id_user";
            $query = mysqli_query($koneksi, $sql);
?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA PEGAWAI</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Status</th>
                      <th>Jadwal Jaga</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama</th>
                      <th>Menu</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td><?php echo $row['id_user']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['jadwal']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['nama_user']; ?></td>
            
            <td>
                <a href='?page=edit-user&id_user=<?php echo $row['id_user']; ?>' class='btn btn-info btn-sm' title='Edit'><i class='fa fa-edit'></i></a> 
                <a href='?page=user-adm&id_user=<?php echo $row['id_user']; ?>' onclick='return confirm("Hapus <?php echo $row['id_user']; ?>?")' class='btn btn-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i></a>
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