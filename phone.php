<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page='';
$data = $phone->get();
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
                    <h5 class="m-b-10">Data Phone</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Phone</a></li>
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
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>RAM</th>
                      <th>Memory Internal</th>
                      <th>Kamera</th>
                      <th>Layar</th>
                      <th>Foto</th>
                      <?php if ($_SESSION['user']['level']=="Administrator"): ?>
                        <th>Tindakan</th>
                        <?php else: ?>
                        <?php endif ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $key => $value): ?>
                        <tr>
                          <td><?= $key+1 ?></td>
                          <td><?= $value['nama_phone'] ?></td>
                          <td><?= $value['harga_phone'] ?></td>
                          <td><?= $value['ram'] ?></td>
                          <td><?= $value['memory_internal'] ?></td>
                          <td><?= $value['kamera'] ?></td>
                          <td><?= $value['layar'] ?></td>
                          <td width="8%">
                            <?php if (empty($value['foto_phone'])): ?>
                              <img width="60" class="img-thumbnail" src="media/upload-phone/no-img.jpg" alt="">
                              <?php else: ?>
                                <img width="60" class="img-thumbnail" src="media/upload-phone/<?= $value['foto_phone'] ?>" alt="">
                              <?php endif ?>
                            </td>
                            <?php if ($_SESSION['user']['level']=="Administrator"): ?>
                              <td width="18%">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaledit<?= $value['id_phone'] ?>"><i class="feather icon-edit"></i> Ubah</button>
                                <a href="hapus.php?id_phone=<?= $value['id_phone'] ?>" class="btn btn-danger btn-sm hapus-phone"><i class="feather icon-trash"></i> Hapus</a>
                              </td>
                              <?php else: ?>
                              <?php endif ?>

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
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Smartphone</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Harga</label>
                  <input type="number" name="harga" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">RAM</label>
                  <input type="text" name="ram" class="form-control" placeholder="RAM" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Memory Internal</label>
                  <input type="text" name="memory" class="form-control" placeholder="Memory Internal" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Kamera</label>
                  <input type="text" name="kamera" class="form-control" placeholder="Kamera" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Layar</label>
                  <input type="text" name="layar" class="form-control" placeholder="Layar" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Foto</label>
                  <input type="file" name="foto" class="form-control">
                </div>
              </div>
              <hr>
              <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
              <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
            </form>
            <?php  
            if (isset($_POST['simpan'])) 
            {
              $phone->add($_POST['nama'],$_POST['harga'],$_POST['ram'],$_POST['memory'],$_POST['kamera'],$_POST['layar'],$_FILES['foto']);
              echo "<script>alert('Smartphone berhasil ditambahkan!');</script>";
              echo "<script>location='phone.php';</script>";
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <?php foreach ($data as $key => $value): ?>
      <div id="myModaledit<?= $value['id_phone'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Smartphone</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-md-6">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $value['nama_phone'] ?>" placeholder="Nama" required="">
                    <input type="hidden" name="id_phone" value="<?= $value['id_phone'] ?>" class="form-control" placeholder="Nama" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Harga</label>
                    <input type="number" name="harga" value="<?= $value['harga_phone'] ?>" class="form-control" placeholder="Harga" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">RAM</label>
                    <input type="text" name="ram" value="<?= $value['ram'] ?>" class="form-control" placeholder="RAM" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Memory Internal</label>
                    <input type="text" name="memory" value="<?= $value['memory_internal'] ?>" class="form-control" placeholder="Memory Internal" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Kamera</label>
                    <input type="text" name="kamera" value="<?= $value['kamera'] ?>" class="form-control" placeholder="Kamera" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Layar</label>
                    <input type="text" name="layar" value="<?= $value['layar'] ?>" class="form-control" placeholder="Layar" required="">
                  </div>
                  <div class="form-group col-md-6">
                   <div class="row">
                     <div class="col-md-3">
                      <?php if (empty($value['foto_phone'])): ?>
                      <img width="100" class="img-thumbnail" src="media/upload-phone/no-img.jpg" alt="">
                      <?php else: ?>
                      <img width="100" class="img-thumbnail" src="media/upload-phone/<?= $value['foto_phone'] ?>" alt="">
                      <?php endif ?>
                    </div>
                    <div class="col-md-9">
                      <label for="">Foto</label>
                      <input type="file" name="foto" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <button name="ubah" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
              <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
            </form>
            <?php  
            if (isset($_POST['ubah'])) 
            {
              $phone->edit($_POST['nama'],$_POST['harga'],$_POST['ram'],$_POST['memory'],$_POST['kamera'],$_POST['layar'],$_FILES['foto'],$_POST['id_phone']);
              echo "<script>alert('Smartphone berhasil diubah!');</script>";
              echo "<script>location='phone.php';</script>";
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>

  <?php include 'footer.php'; ?>