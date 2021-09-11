<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page = '';
$data = $user->get();
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
                    <h5 class="m-b-10">Manajemen User</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Manajemen User</a></li>
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
                      <th>Username</th>
                      <th>Telepon</th>
                      <th>Jenis Kelamin</th>
                      <th>Foto</th>
                      <th>Alamat</th>
                      <th>Level</th>
                      <?php if ($_SESSION['user']['level']=="Tata Usaha"): ?>
                        <th>Tindakan</th>
                        <?php else: ?>
                        <?php endif ?>
                      </tr>
                      
                    </thead>
                    <tbody>
                      <?php foreach ($data as $key => $value): ?>
                        <tr>
                          <td><?= $key+1 ?></td>
                          <td><?= $value['nama'] ?></td>
                          <td><?= $value['username'] ?></td>
                          <td><?= $value['telepon'] ?></td>
                          <td><?= $value['jenis_kelamin'] ?></td>

                          <td>
                            <?php if (empty($value['foto'])): ?>
                              <img width="60" class="img-thumbnail" src="media/upload-user/no-img.jpg" alt="">
                              <?php else: ?>
                                <img width="60" class="img-thumbnail" src="media/upload-user/<?= $value['foto'] ?>" alt="">
                              <?php endif ?>
                            </td>
                            <td><?= $value['alamat'] ?></td>
                            <td><?= $value['level'] ?></td>
                            <?php if ($_SESSION['user']['level']=="Tata Usaha"): ?>
                              <td width="25%">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModaledit<?= $value['id_user'] ?>"><i class="feather icon-plus"></i> Ubah</button>
                                <a href="hapus.php?id_user=<?= $value['id_user'] ?>" class="btn btn-danger btn-sm hapus-user"><i class="feather icon-trash"></i> Hapus</a>
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
            <h4 class="modal-title">Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama Karyawan" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Telepon</label>
                  <input type="number" name="telepon" class="form-control" placeholder="Telepon" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Jenis Kelamin</label>
                  <select name="jk" id="" class="form-control" required="">
                    <option value="">- Pilih Jenis Kelamin -</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Foto</label>
                  <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Level</label>
                  <select name="level" id="" class="form-control" required="">
                    <option value="">- Pilih Level -</option>
                    <option value="Tata Usaha">Tata Usaha</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Alamat</label>
                  <textarea name="alamat" id="alamat"  class="form-control" placeholder="Alamat" required=""></textarea>
                </div>
              </div>
              <hr>
              <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
              <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
            </form>
            <?php  
            if (isset($_POST['simpan'])) 
            {
              $hasil = $user->add($_POST['nama'],$_POST['username'],$_POST['password'],$_POST['telepon'],$_POST['jk'],$_FILES['foto'],$_POST['level'],$_POST['alamat']);
              if ($hasil=="sukses") 
              {
               echo "<script>alert('User berhasil ditambahkan!');</script>";
               echo "<script>location='user.php';</script>";
             }
             else
             {
              echo "<script>alert('Username tidak tersedia!');</script>";
              echo "<script>location='user.php';</script>";
            }
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
    <div id="myModaledit<?= $value['id_user'] ?>" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Nama Lengkap</label>
                  <input type="text" name="nama" value="<?= $value['nama'] ?>" class="form-control" placeholder="Nama Karyawan" required="">
                  <input type="hidden" name="id_user" value="<?= $value['id_user'] ?>" class="form-control" placeholder="Nama Karyawan" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Username</label>
                  <input type="text" name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Username" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Telepon</label>
                  <input type="number" name="telepon" value="<?= $value['telepon'] ?>" class="form-control" placeholder="Telepon" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="">Jenis Kelamin</label>
                  <select name="jk" id="" class="form-control" required="">
                   <option value="">- Pilih Jenis Kelamin -</option>
                   <option value="Laki-Laki" <?php if ($value['jenis_kelamin']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                   <option value="Perempuan" <?php if ($value['jenis_kelamin']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                 </select>
               </div>
               <div class="form-group col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <?php if (empty($value['foto'])): ?>
                      <img width="100" class="img-thumbnail" src="media/upload-user/no-img.jpg" alt="">
                      <?php else: ?>
                        <img width="100" class="img-thumbnail" src="media/upload-user/<?= $value['foto'] ?>" alt="">
                      <?php endif ?>
                    </div>
                    <div class="col-md-9">
                      <label for="">Foto</label>
                      <input type="file" name="foto" class="form-control">
                    </div>
                  </div>

                </div>
                <div class="form-group col-md-6">
                  <label for="">Level</label>
                  <select name="level" id="" class="form-control">
                    <option value="Administrator" <?php if ($value['level']=="Administrator") {echo "selected";} ?>>Administrator</option>
                    <option value="User" <?php if ($value['level']=="User") {echo "selected";} ?>>User</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="">Alamat</label>
                  <textarea name="alamat" id="alamat"  class="form-control" placeholder="Alamat" required=""><?= $value['alamat'] ?></textarea>
                </div>
              </div>
              <hr>
              <button name="ubah" class="btn btn-primary"><i class="feather icon-edit"></i> Simpan</button>
            </form>
            <?php  
            if (isset($_POST['ubah'])) 
            {
             $user->edit($_POST['nama'],$_POST['username'],$_POST['telepon'],$_POST['jk'],$_FILES['foto'],$_POST['level'],$_POST['alamat'],$_POST['id_user']);

             echo "<script>alert('User berhasil diubah!');</script>";
             echo "<script>location='user.php';</script>";
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