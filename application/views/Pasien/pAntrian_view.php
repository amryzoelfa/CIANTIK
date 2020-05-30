<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Antrian</h1>
</div>

<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4 bg-primary">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <table id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <H1>
                                        <font color="white">POLI UMUM</H1>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <h2>
                                        <font color="white">A - <?php if (!empty($umum)) {
                                                echo $umum['no_antrian'];
                                            } ?></h2>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <h5>
                                        <font color="white">Jumlah Antrian : <?= $jumlahUmum['jumlah_au']; ?></h5>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>
                                <td><a href="<?php echo site_url().'Pasien/CetakUmum' ?>" class="btn btn btn-danger" name="ambil" style="width: 100%" value="submit">Ambil Antrian Anda</a></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4 bg-success">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <table id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <H1>
                                        <font color="white">POLI GIGI</H1>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>

                                <td align="center">
                                    <h2>
                                        <font color="white">B - <?php if (!empty($gigi)) {
                                                echo  $gigi['no_antrian'];
                                            } ?></h2>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <h5>
                                        <font color="white">Jumlah Antrian : <?= $jumlahGigi['jumlah_ag']; ?></h5>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>
                                <td><a href="<?php echo site_url().'Pasien/CetakGigi' ?>" class="btn btn btn-danger" name="ambil2" style="width: 100%" value="submit">Ambil Antrian Anda</a></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>