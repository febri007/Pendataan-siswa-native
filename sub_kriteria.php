<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page='';
$id_kriteria = $_GET['id'];
$data = $kriteria->sub($id_kriteria);
$detail = $kriteria->detail($id_kriteria);
?>
<div class="pcoded-main-container">
  <div class="pcoded-wrapper container">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <div class="page-header">
              <div class="page-block">
                <div class="row align-items-center">
                  <div class="col-md-12">
                    <div class="page-header-title">
                      <h5 class="m-b-10">Sub Data Kriteria</h5>
                    </div>
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#!">Data Kriteria</a></li>
                      <li class="breadcrumb-item"><a href="#!">Sub Data Kriteria</a></li>
                      <li class="breadcrumb-item"><a href="#!"><?= $detail['nama_kriteria'] ?></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4">
                <div class="card">

                  <div class="card-body">
                    <a href="kriteria.php" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                    <hr>
                    <form method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="">Range</label>
                        <input type="text" name="range" class="form-control" placeholder="Cth : 0 - 59" required="">
                      </div>
                      
                      <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="text" name="nilai" class="form-control" placeholder="Cth : 40" required="">
                      </div>
                      <hr>
                      <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                    </form>
                    <?php  
                    if (isset($_POST['simpan'])) 
                    {
                     $kriteria->add_sub($_POST['range'],$_POST['nilai'],$id_kriteria);
                     echo "<script>alert('Sub kriteria berhasil ditambahkan!');</script>";
                     echo "<script>location='sub_kriteria.php?id=$id_kriteria';</script>";
                   }
                   ?>
                 </div>
               </div>
             </div>
             <div class="col-sm-8">
              <div class="card">

                <div class="card-body">
                  <table class="table table-striped table-bordered" id="example">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Range</th>
                        <th>Nilai</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach ($data as $key => $value): ?>

                        <tr>
                          <td width="6%"><?= $key+1 ?></td>
                          <td><?= $value['range_n'] ?></td>
                          <td><?= $value['nilai'] ?></td>
                          <td width="20%">
                            <a href="hapus.php?id_sub_kriteria=<?= $value['id_sub_kriteria'] ?>&id_krt=<?= $value['id_kriteria'] ?>" class="btn btn-danger btn-sm hapus-kriteria"><i class="feather icon-trash"></i> Hapus</a>
                          </td>
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

<?php include 'footer.php'; ?>