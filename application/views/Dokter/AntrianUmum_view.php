<section class="feedback_area section_gap relative">
    <div class="container">
        <br>
        <font size="+6" color="grey" face="arial">
            <center>
                <h2>Daftar Antrian</h2>
            </center>
        </font>
        <table class="table table-bordered" method="post">
            <thead>
                <tr>
                    <th>No Antrian</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                //var_dump($antrian);
                if (!empty($antrian)) {
                    foreach ($antrian as $data) {
                ?>
                        <tr>
                            <td><?php echo $data->no_antrian; ?></td>
                            <td><?php echo $data->nama; ?></td>
                            <td><?php if ($data->id_status_periksa == 1) {
                                    echo "BELUM";
                                } else if ($data->id_status_periksa == 2) {
                                    echo "SUDAH";
                                } else {
                                    echo "PROSES";
                                } ?></td>
                            <td>
                                <?php
                                if ($data->id_status_periksa == 2) {
                                ?>
                                    <button class="btn btn-primary" disabled="true">Periksa</button>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo site_url().'Dokter/edit_umum/'.$data->id_user; ?>" class="btn btn-primary" name="periksa" value="submit">Periksa</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</section>