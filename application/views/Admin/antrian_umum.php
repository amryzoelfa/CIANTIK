 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Antrian Poli Umum</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Status Periksa</th>
                      <th>Status Obat</th>
                      <!-- <th>Tindakan</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Status Periksa</th>
                      <th>Status Obat</th>
                      <!-- <th>Tindakan</th> -->
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  if( !empty($antrian) ) {
                    foreach ($antrian as $data) {
                  ?> 
                    <tr>
                      <td><?php echo $data->no_antrian;?></td>
                      <td><?php echo $data->tanggal;?></td>
                      <td><?php echo $data->no_identitas;?></td>
                      <td><?php echo $data->nama;?></td>
                      <td><?php if($data->id_status_periksa==1){
                        echo "Belum";
                      }elseif ($data->id_status_periksa==2) {
                        echo "Sudah";
                      }else{
                        echo "Proses";
                      }?></td>
                      <td><?php if($data->id_status_obat==1){
                        echo "Belum";
                      }elseif ($data->id_status_obat==2) {
                        echo "Sudah";
                      }else{
                        echo "Proses";
                      }?></td>
                    </tr>
                    <?php 
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>

        </div>
        <!-- /.container-fluid -->
