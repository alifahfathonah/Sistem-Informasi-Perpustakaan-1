<!-- Modal -->
    <div id="ModalAnggota" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cari Anggota</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class='table-responsive'>
                            <table id="kotak2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql= "SELECT * FROM anggota";
                                    $query = mysql_query($sql);
                                    while ($data = mysql_fetch_array($query)) {
                                    ?>
                                        <tr class="choice" niss="<?php echo $data['nis']; ?>" kelass="<?php echo $data['kelas']; ?>" namas="<?php echo $data['nama']; ?>" subkelass="<?php echo $data['sub_kelas']; ?>">
                                        <td><?php echo $data['nis']; ?></td>
                                        <td><?php echo $data['kelas'].'.'.$data['sub_kelas']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>