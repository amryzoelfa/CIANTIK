          <div class="card shadow mb-3">
          	<br>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Antrian </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Antrian</th>
                      <th>Tanggal Periksa</th>
                      <th>Nama</th>

                      <th>POLI</th>
                       <th>Status Periksa</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (!empty($antrian)) {
                      foreach ($antrian as $data) {
                        ?>
                        <tr>
                          <td><?php echo $data->no_antrian; ?></td>
                          <td><?php echo $data->tanggal; ?></td>
                          <td><?php echo $data->nama; ?></td>
                          <td><?php echo $data->ket_poli; ?></td>
                          <td><?php echo $data->ket_status; ?></td>
                          <td>
                            <!-- <a href="apoteker-riwayat.php?id_antrian=<?php //echo $data->no_identitas; ?>" name="lihat" style=’text-decoration:none’ onclick=\”return\”> Lihat </a> -->
                            <a href="<?php echo site_url().'Apoteker/Riwayat/'.$data->no_identitas.'/'.$data->ket_poli; ?>" name="lihat" style=’text-decoration:none’ onclick=\”return\”> Lihat </a>
                        </tr>
                      <?php }
                    } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>