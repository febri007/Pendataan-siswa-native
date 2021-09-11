<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page='';
$data = $rangking->get();
$kriteria = $kriteria->get();
$kriteria2 = $kriteria;
$kriteria3 = $kriteria;
$kriteria4 = $kriteria;
$siswa = $siswa->get();
$siswa2 = $siswa;
$siswa3 = $siswa;
$siswa4 = $siswa;
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
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Laporan</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Laporan</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Laporan Perangkingan</a>
                    </li>
                    <li style="cursor: pointer;">
                      <a class="nav-link" onclick="printDiv('pills-home')" role="tab"><i class="feather icon-printer"></i> Cetak Laporan</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <hr>
                      <h6>Hasil Akhir</h6>
                      <hr>
                      <table class="table table-striped table-bordered">


                        <?php  
                        $data = array();
                        ?>
                        <?php foreach ($siswa4 as $key => $siswa4): ?>
                          <?php  
                          $total = 0;
                          $id_siswa = $siswa4['id_siswa'];
                          $show_nilai4 = $rangking->show_nilai($id_siswa);
                          ?>
                          <tr>

                            <?php foreach ($show_nilai4 as $show_nilai4): ?>
                              <?php  
                              $id_kriteria = $show_nilai4['id_kriteria'];
                              $tipe = $show_nilai4['tipe_kriteria'];
                              $bobot = $show_nilai4['bobot_kriteria'];
                              ?>

                              <?php  
                              if ($tipe=="Benefit") 
                              {
                                $stmtmax = $rangking->readMax($id_kriteria);
                                $nor =  round($show_nilai4['nilai_rangking']/$stmtmax['rmax'],2);
                                $hasil = $nor*$bobot;
                                $total += $hasil;
                              }
                              else
                              {
                                $stmtmin = $rangking->readMin($id_kriteria);
                                $nor = round($stmtmin['rmin']/$show_nilai4['nilai_rangking'],2);
                                $hasil = $nor*$bobot;
                                $total += $hasil;
                              }
                              ?>
                            <?php endforeach ?>
                            <?php  
                            $data[$key] = array('total' => $total, 'nm_siswa' => $siswa4['nm_siswa']); 
                            ?>
                          </tr>
                        <?php endforeach ?>
                        <?php  
                        arsort($data); 
                        ?>
                        <thead>
                          <tr>
                            <th rowspan="2" style="vertical-align: middle" class="text-center">NO.</th>
                            <th rowspan="2" style="vertical-align: middle" class="text-center"> Nama siswa <br> (Alternatif)</th>
                            <th rowspan="2" class="text-center">Hasil</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                          $no=0;
                          ?>
                          <?php foreach ($data as $key => $value): ?>
                            <?php  
                            $no++;
                            ?>
                            <tr>
                              <th width="5%"><?= $no ?></th>
                              <th><?= $value['nm_siswa'] ?></th>
                              <th><?= $value['total'] ?></th>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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