<html>

<head>

    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        table td {
            word-wrap: break-word;
            width: 20%;
        }
    </style>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/jquery-ui/jquery-ui.min.css') ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script> <!-- Load file jquery -->

</head>

<body>

    <b><?php echo $ket; ?></b><br /><br />

    <table border="1" cellpadding="8">
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

</body>

</html>