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
                                    <H1>POLI UMUM</H1>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>
                                <?php foreach ($umum as $data) { ?>
                                    <td align="center">
                                        <h2>A - <?php echo $data->no_antrian; ?></h2>
                                    </td>
                                <?php } ?>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <h5>Jumlah Antrian : <?= $jumlahAUmum['total_umum']; ?></h5>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>
                                <td><button type="submit" class="btn btn-user btn-block btn-danger" name="ambil1" value="submit"> Ambil Antrian Anda</button></td>
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
                                    <H1>POLI GIGI</H1>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>

                                <td align="center">
                                    <h2>B - </h2>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">
                                    <h5>Jumlah Antrian : <?= $jumlahAGigi['total_gigi']; ?></h5>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <TR>
                                <TD>&nbsp;</TD>
                            </TR>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center"><button type="submit" class="btn btn-user btn-block btn-danger" name="ambil2" value="submit"> Ambil Antrian Anda</button></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>