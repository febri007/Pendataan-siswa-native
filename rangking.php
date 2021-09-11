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
$kriteria5 = $kriteria;
$siswa = $siswa->get();
$siswa2 = $siswa;
$siswa3 = $siswa;
$siswa4 = $siswa;
$siswa5 = $siswa;
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
                    <h5 class="m-b-10">Data Rangking</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Rangking</a></li>
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
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Semua Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Perangkingan</a>
                    </li>
                  </ul>
                  <hr>

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="feather icon-plus"></i> Tambah</button>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Siswa</th>
                              <th>Kriteria</th>
                              <th>Nilai</th>
                              <th>Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach ($data as $key => $value): ?>

                              <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $value['nm_siswa'] ?></td>
                                <td><?= $value['nama_kriteria'] ?></td>
                                <td><?= $value['nilai_rangking'] ?></td>
                                <td width="17%">
                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?= $value['id_rangking'] ?>"><i class="feather icon-edit"></i> Ubah</button>
                                  <a href="rangking/delete/<?= $value['id_rangking'] ?>" class="btn btn-danger hapus-nilai"><i class="feather icon-trash"></i> Hapus</a>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>

                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                      <h4 class="text-center">Hasil Analisa</h4>
                      <hr>
                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Nilai Alternatif Kriteria</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Normalisasi (R)</a>
                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Nilai Preperensi (P)</a>
                          <a class="nav-item nav-link" id="nav-hasil-tab" data-toggle="tab" href="#nav-hasil" role="tab" aria-controls="nav-hasil" aria-selected="false">Hasil Alhir</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <br>
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle" class="text-center"> Nama Siswa <br> (Alternatif)</th>
                                  <th colspan="<?= count($kriteria) ?>" class="text-center">Kriteria</th>
                                </tr>
                                <tr>
                                  <?php foreach ($kriteria as $kriteria): ?>
                                    <th><?= $kriteria['nama_kriteria'] ?></th>
                                  <?php endforeach ?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($siswa as $siswa): ?>
                                  <?php  
                                  $id_siswa = $siswa['id_siswa'];
                                  $show_nilai = $rangking->show_nilai($id_siswa);
                                  ?>
                                  <tr>
                                    <th><?= $siswa['nm_siswa'] ?></th>

                                    <?php foreach ($show_nilai as $show_nilai): ?>
                                      <td><?= $show_nilai['nilai_rangking'] ?></td>
                                    <?php endforeach ?>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <br>
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle" class="text-center"> Nama Siswa <br> (Alternatif)</th>
                                  <th colspan="<?= count($kriteria) ?>" class="text-center">Kriteria</th>
                                </tr>
                                <tr>
                                  <?php foreach ($kriteria2 as $kriteria2): ?>
                                    <th><?= $kriteria2['nama_kriteria'] ?></th>
                                  <?php endforeach ?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($siswa2 as $siswa2): ?>
                                  <?php  
                                  $id_siswa = $siswa2['id_siswa'];
                                  $show_nilai2 = $rangking->show_nilai($id_siswa);
                                  ?>
                                  <tr>
                                    <th><?= $siswa2['nm_siswa'] ?></th>

                                    <?php foreach ($show_nilai2 as $show_nilai2): ?>
                                      <?php  
                                      $id_kriteria = $show_nilai2['id_kriteria'];
                                      $tipe = $show_nilai2['tipe_kriteria'];
                                      $bobot = $show_nilai2['bobot_kriteria'];
                                      ?>
                                      <td>
                                        <?php  
                                        if ($tipe=="Benefit") 
                                        {
                                          $stmtmax = $rangking->readMax($id_kriteria);
                                          echo $nor =  round($show_nilai2['nilai_rangking']/$stmtmax['rmax'],2);
                                        }
                                        else
                                        {
                                          $stmtmin = $rangking->readMin($id_kriteria);
                                          echo $nor = round($stmtmin['rmin']/$show_nilai2['nilai_rangking'],2);
                                        }
                                        ?>
                                      </td>
                                    <?php endforeach ?>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <br>
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th rowspan="2" style="vertical-align: middle" class="text-center">  Nama Siswa <br> (Alternatif)</th>
                                  <th colspan="<?= count($kriteria3) ?>" class="text-center">Kriteria</th>
                                  <th rowspan="2" class="text-center">Hasil</th>
                                </tr>
                                <tr>
                                  <?php foreach ($kriteria3 as $kriteria3): ?>
                                    <th><?= $kriteria3['nama_kriteria'] ?></th>
                                  <?php endforeach ?>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <?php foreach ($siswa3 as $siswa3): ?>
                                    <?php  
                                    $total = 0;
                                    $id_siswa = $siswa3['id_siswa'];
                                    $show_nilai3 = $rangking->show_nilai($id_siswa);
                                    ?>

                                    <th><?= $siswa3['nm_siswa'] ?></th>
                                    <?php foreach ($show_nilai3 as $show_nilai3): ?>
                                      <?php  
                                      $id_kriteria = $show_nilai3['id_kriteria'];
                                      $tipe = $show_nilai3['tipe_kriteria'];
                                      $bobot = $show_nilai3['bobot_kriteria'];
                                      ?>
                                      <td>
                                        <?php  
                                        if ($tipe=="Benefit") 
                                        {
                                          $stmtmax = $rangking->readMax($id_kriteria);
                                          $nor =  round($show_nilai3['nilai_rangking']/$stmtmax['rmax'],2);
                                          echo $hasil = $nor*$bobot;
                                          $total += $hasil;
                                        }
                                        else
                                        {
                                          $stmtmin = $rangking->readMin($id_kriteria);
                                          $nor = round($stmtmin['rmin']/$show_nilai3['nilai_rangking'],2);
                                          echo $hasil = $nor*$bobot;
                                          $total += $hasil;
                                        }
                                        ?>
                                      </td>
                                    <?php endforeach ?>
                                    <th>
                                      <?= $total ?>
                                    </th>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-hasil" role="tabpanel" aria-labelledby="nav-hasil-tab">
                          <br>
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

                            <?php endforeach ?>
                            <?php  
                            arsort($data); 
                            ?>
                            <thead>
                              <tr>
                                <th rowspan="2" style="vertical-align: middle" class="text-center">NO.</th>
                                <th rowspan="2" style="vertical-align: middle" class="text-center"> Nama Siswa <br> (Alternatif)</th>
                                <th rowspan="2" class="text-center">Hasil</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                              $no = 1;
                              ?>
                              <?php foreach ($data as $key => $value): ?>
                                <tr>
                                  <th width="5%"><?= $no ?></th>
                                  <th><?= $value['nm_siswa'] ?></th>
                                  <th><?= $value['total'] ?></th>
                                </tr>
                                <?php  
                                $no++;
                                ?>
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
  </div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Rangking</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">
              <label for="">Nama Siswa</label>
              <select name="id_siswa" id="id_siswa" class="form-control" required="">
                <option value="">- Pilih Siswa -</option>
                <?php foreach ($siswa5 as $siswa): ?>
                  <option value="<?= $siswa['id_siswa'] ?>"><?= $siswa['nm_siswa'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="row">
              <?php foreach ($kriteria5 as $key => $value): ?>
                <div class="form-group col-md-9">
                  <label for="">Kriteria</label>
                  <input type="text" name="kriteria" value="<?= $value['nama_kriteria'] ?>" class="form-control">
                  <input type="hidden" name="id_kriteria[]" value="<?= $value['id_kriteria'] ?>" class="form-control">
                </div>
                <?php 
                $semuadata = array();
                $id_kriteria = $value['id_kriteria'];
                $query = mysqli_query($mysqli, "SELECT * FROM tbl_sub_kriteria WHERE id_kriteria='$id_kriteria'");
                while ($pecahdata=$query->fetch_assoc()) 
                {
                  $semuadata[]=$pecahdata;
                }
                ?>
                <div class="form-group col-md-3">
                  <label for="">Nilai</label>
                  <select name="nilai[]" id="" class="form-control">
                    <option value="">- Pilih Nilai -</option>
                    <?php foreach ($semuadata as $sub2): ?>
                      <option value="<?= $sub2["nilai"] ?>"><?= $sub2['kategori'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              <?php endforeach ?>
            </div>
            <hr>
            <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
          </form>
          <?php  
          if (isset($_POST['simpan'])) 
          {
            $id_user = $_SESSION['user']['id_user'];
            $id_siswa = $_POST['id_siswa'];
            $id_kriteria = $_POST['id_kriteria'];
            $nilai = $_POST['nilai'];
            $count = count($id_kriteria);

            $sql   = "INSERT INTO tbl_rangking (id_siswa,id_kriteria,nilai_rangking,id_user) VALUES ";

            for( $i=0; $i < $count; $i++ )
            {
              $sql .= "('{$id_siswa}','{$id_kriteria[$i]}','{$nilai[$i]}','{$id_user[$i]}')";
              $sql .= ",";
            }

            $sql = rtrim($sql,",");

            $insert = $mysqli->query($sql);

            if($insert)
            {
              echo "<script>alert('Analisa beasiswa berhasil di simpan!');</script>";
              echo "<script>location='rangking.php';</script>";
            }else{
              echo "<script>alert('Analisa beasiswa gagal di simpan!');</script>";
              echo "<script>location='rangking.php';</script>";
            }
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>