<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Kunjungan Hari ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahKunjunganHari['totalkh']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">Pasien</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPasien['total_pasien']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fab fa-accessible-icon fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Dokter</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahDokter['total_dokter']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Apoteker</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahApoteker['total_apoteker']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <br>
<!-- Content Row -->


<!-- <br><br><br><br><br><br><br><br><br><br> -->