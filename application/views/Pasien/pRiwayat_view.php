<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Riwayat</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Poli</th>
                        <th>Diagnosa</th>
                        <th>Tindakan</th>
                        <th>Obat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($riwayat as $data) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data->tanggal_periksa; ?></td>
                            <td><?php if ($data->id_poli == 1) {
                                    echo "UMUM";
                                } else {
                                    echo "GIGI";
                                }; ?></td>
                            <td><?php echo $data->diagnosa; ?></td>
                            <td><?php echo $data->tindakan; ?></td>
                            <td><?php echo $data->resep_obat; ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>