<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Tindakan</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php
                    foreach ($dokter as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data->no_identitas; ?></td>
                            <td><?php echo $data->nama; ?></td>
                            <td><img src="<?php echo base_url('assets/img/') . $data->foto; ?>" width="80" height="80"></td>
                            <td><?php if ($data->jenis_kelamin == 'L') {
                                    echo "Laki-laki";
                                } else {
                                    echo "Perempuan";
                                }; ?></td>
                            <td><?php echo $data->tempat_lahir; ?>, <?php echo date("d-m-Y", strtotime($data->tanggal_lahir)); ?></td>
                            <td><?php echo $data->no_hp; ?></td>
                            <td><?php echo $data->alamat; ?></td>
                            <td>
                                <?php
                                echo '<a href="' . base_url('Master/edit/' . $data->id_user) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a>';
                                echo "||";
                                echo '<a href="' . base_url('Master/hapus/' . $data->id_user) . '"  class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                                ?>
                            </td>
                        </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>