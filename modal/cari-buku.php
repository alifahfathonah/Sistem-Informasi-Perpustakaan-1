<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cari Buku</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class='table-responsive'>
                            <table id="kotak" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql= "SELECT * FROM buku";
                                    $query = mysql_query($sql);
                                    while ($data = mysql_fetch_array($query)) {
                                    ?>
                                        <tr class="pilih" kodebk="<?php echo $data['id_buku']; ?>" judulbk="<?php echo $data['judul']; ?>" pengarangbk="<?php echo $data['pengarang']; ?>">
                                        <td><?php echo $data['id_buku']; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['pengarang']; ?></td>
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