<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Poli</h6>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-file-signature fa-sm text-white-50"></i> Tambah Poli</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Poli</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Poli</th>
                        <th>Tindakan</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($poli as $data) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data->ket_poli; ?></td>
                            <td>
                                <?php
                                echo '<a href="' . base_url('Master/edit/' . $data->id_poli) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a>';
                                echo "||";
                                echo '<a href="' . base_url('Master/hapus/' . $data->id_poli) . '"  class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                                ?>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Tambah Data-->
<div class="modal fade" id="modalTambah" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Poli</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Poli</label>
                        <div class="col-sm-9">
                            <input type="text" name="poli" class="form-control" size="4" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="tambah" class="btn btn-primary" value="SIMPAN">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>