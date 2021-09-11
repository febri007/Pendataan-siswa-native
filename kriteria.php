<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page='';
$data = $kriteria->get();
if (!isset($_SESSION['user'])) 
{
    echo "<script>location='login.php';</script>";
}
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
                    <h5 class="m-b-10">Data Kriteria C<sub>i</sub></h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Kriteria C<sub>i</sub></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">

                <div class="card-body">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="feather icon-plus"></i> Tambah</button>
                 <hr>
                 <table class="table table-striped table-bordered" id="example">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kriteria</th>
                      <th>Tipe Kriteria</th>
                      <th>Bobot Kriteria</th>
                      <?php if ($_SESSION['user']['level']=="Administrator"): ?>
                        <th>Tindakan</th>
                        <?php else: ?>
                        <?php endif ?>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  
                     $totbobot = 0;
                     ?>
                     <?php foreach ($data as $key => $value): ?>
                      <?php  
                      $totbobot += $value['bobot_kriteria'];
                      ?>
                      <tr>
                        <td width="6%"><?= $key+1 ?></td>
                        <td><?= $value['nama_kriteria'] ?></td>
                        <td><?= $value['tipe_kriteria'] ?></td>
                        <td><?= $value['bobot_kriteria'] ?></td>
                        <?php if ($_SESSION['user']['level']=="Administrator"): ?>
                          <td width="20%">
                            <a href="sub_kriteria.php?id=<?= $value['id_kriteria'] ?>" class="btn btn-info btn-sm"><i class="feather icon-share"></i> Sub Kriteria</a>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaledit<?= $value['id_kriteria'] ?>"><i class="feather icon-edit"></i> Ubah</button>
                            <a href="hapus.php?id_kriteria=<?= $value['id_kriteria'] ?>" class="btn btn-danger btn-sm hapus-kriteria"><i class="feather icon-trash"></i> Hapus</a>
                          </td>
                          <?php else: ?>
                          <?php endif ?>

                        </tr>
                      <?php endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3">TOTAL BOBOT</th>
                        <th colspan="2"><?= $totbobot ?></th>
                      </tr>
                    </tfoot>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kriteria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <form method="post"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Nama Kriteria</label>
          <input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" required="">
        </div>
        <div class="form-group">
          <label for="">Tipe Kriteria</label>
          <select name="tipe_kriteria" id="" class="form-control" required="">
            <option value="">- Pilih Tipe Kriteria -</option>
            <option value="Benefit">Benefit</option>
            <option value="Cost">Cost</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Bobot Kriteria</label>
          <input type="text" name="bobot_kriteria" class="form-control" placeholder="Bobot Kriteria" required="">
        </div>
        <hr>
        <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
        <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
      </form>
      <?php  
      if (isset($_POST['simpan'])) 
      {
        $kriteria->add($_POST['nama_kriteria'],$_POST['tipe_kriteria'],$_POST['bobot_kriteria']);
        echo "<script>alert('Kriteria berhasil ditambahkan!');</script>";
        echo "<script>location='kriteria.php';</script>";
      }
      ?>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
<?php foreach ($data as $key => $value): ?>
  <div id="myModaledit<?= $value['id_kriteria'] ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Kriteria</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" value="<?= $value['nama_kriteria'] ?>" class="form-control" placeholder="Nama Kriteria" required="">
            <input type="hidden" name="id_kriteria"  value="<?= $value['id_kriteria'] ?>"  class="form-control" placeholder="Nama Kriteria" required="">
          </div>
          <div class="form-group">
            <label for="">Tipe Kriteria</label>
            <select name="tipe_kriteria" id="" class="form-control" required="">
              <option value="">- Pilih Tipe Kriteria -</option>
              <option value="Benefit" <?php if ($value['tipe_kriteria']=="Benefit") {echo "selected";} ?>>Benefit</option>
              <option value="Cost" <?php if ($value['tipe_kriteria']=="Cost") {echo "selected";} ?>>Cost</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Bobot Kriteria</label>
            <input type="text" name="bobot_kriteria"  value="<?= $value['bobot_kriteria'] ?>" class="form-control" placeholder="Bobot Kriteria" required="">
          </div>
          <hr>
          <button name="ubah" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
          <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
        </form>
        <?php  
        if (isset($_POST['ubah'])) 
        {
          $kriteria->edit($_POST['nama_kriteria'],$_POST['tipe_kriteria'],$_POST['bobot_kriteria'],$_POST['id_kriteria']);
          echo "<script>alert('Kriteria berhasil diubah!');</script>";
          echo "<script>location='kriteria.php';</script>";
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php endforeach ?>
<?php include 'footer.php'; ?>