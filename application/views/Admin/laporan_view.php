<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">LAPORAN DATA TRANSAKSI, KUNJUNGAN & PERIKSA</h1>
</div>

<form method="get" action="">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Filter Berdasarkan</label>
        <div class="col-sm-5">
            <select class="form-control" name="filter" id="filter">
                <option value="" selected="">Pilih</option>
                <option value="1">Per Tanggal</option>
                <option value="2">Per Bulan</option>
                <option value="3">Per Tahun</option>
            </select>
        </div>
    </div>

    <div class="form-group row" id="form-tanggal">
        <label class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-5">
            <input type="date" name="tanggal" class="form-control" size="4" /><!-- class="input-tanggal"  -->
        </div>
    </div>

    <div class="form-group row" id="form-bulan">
        <label class="col-sm-2 col-form-label">Bulan</label>
        <div class="col-sm-5">
            <select class="form-control" name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
    </div>

    <div class="form-group row" id="form-tahun">
        <label class="col-sm-2 col-form-label">Tahun</label>
        <div class="col-sm-5">
            <select class="form-control" name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" value="">Tampilkan</button>
            <a href="<?php echo base_url('Admin/Laporan'); ?>" class="btn btn-danger">Reset Filter</a>
        </div>
    </div>

</form>
<hr />

<b><?php echo $ket; ?></b><br /><br />
<a href="<?php echo $url_cetak; ?>" class="btn btn-success"><i class="fas fa-print"></i>CETAK PDF</a><br /><br />


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal Periksa</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Poli</th>
            <th>Tensi Darah</th>
            <th>Gejala</th>
            <th>Diagnosa</th>
            <th>Obat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($transaksi)) {
            $no = 1;
            foreach ($transaksi as $data) {
                $tgl = date('d-m-Y', strtotime($data->tanggal)); // Ubah format tanggal jadi dd-mm-yyyy
                echo "<tr>";
                echo "<td>" . $tgl . "</td>";
                echo "<td>" . $data->no_identitas . "</td>";
                echo "<td>" . $data->nama . "</td>"; ?>
                <td><?php if ($data->id_poli == 1) {
                        echo "UMUM";
                    } else {
                        echo "GIGI";
                    } ?>
                </td>
        <?php echo "<td>" . $data->tensi_darah . "</td>";
                echo "<td>" . $data->gejala . "</td>";
                echo "<td>" . $data->diagnosa . "</td>";
                echo "<td>" . $data->resep_obat . "</td>";
                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
        }
        ?>
    </tbody>

</table>