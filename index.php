<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page = 'home';
$totkriteria = $kriteria->totkriteria();
$totsiswa = $siswa->totsiswa();
$totuser = $user->totuser();
$siswa4 = $siswa->get();
if (!isset($_SESSION['user'])) 
{
    echo "<script>location='login.php';</script>";
}
?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-blue order-card">
                                <div class="card-body">
                                    <h6 class="text-white">Data Siswa</h6>
                                    <h2 class="text-right text-white"><i class="feather icon-users float-left"></i><span><?= $totsiswa ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-green order-card">
                                <div class="card-body">
                                    <h6 class="text-white">Data Kriteria</h6>
                                    <h2 class="text-right text-white"><i class="feather icon-list float-left"></i><span><?= $totkriteria ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-body">
                                    <h6 class="text-white">Data Pengguna</h6>
                                    <h2 class="text-right text-white"><i class="feather icon-user float-left"></i><span><?= $totuser ?></span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Penjelasan Singkat</h5>

                                </div>
                                <div class="card-body">
                                    <p>Aplikasi ini adalah aplikasi sistem pendukung keputusan menentukan beasiswa dengan metode saw (simple additive weighting) yang mengharuskan untuk menginput data siswa terlebih dahulu, kemudian baru data kriteria dan tahap akhir dengan melakukan perangkingan pada data rangking dan melihat laporan hasil akhir.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card table-card">
                                <div class="card-header">

                                </div>
                                <div class="card-body">
                                    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>