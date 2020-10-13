<?php 
                    if($_SESSION['status']=="admin"){
                        ?>
                        <script language script="JavaScript">
                            document.location='?page=user-adm';
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
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA PEGAWAI</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Jadwal Jaga</th>
                      <th>Status</th>
                      <!-- <th>Username</th>
                      <th>Password</th> -->
                    </tr>
                  </thead>
                  <tbody>
<?php
    while($row=mysqli_fetch_array($query)){
?>
        <tr>
            <td align="center"><?php echo $row['id_user']; ?></td>
            <td><?php echo $row['nama_user']; ?></td>
            <td><?php echo $row['jadwal']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <!-- <td><?php echo $row['username']; ?></td> -->
            <!-- <td><?php echo $row['password']; ?></td> -->
        </tr>
<?php
}
?>
                  </tbody>
                </table>
        </div>
    </div>
</div>