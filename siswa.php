<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page='';
$data = $siswa->get();
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
                    <h5 class="m-b-10">Data Siswa</h5>
                  </div>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Siswa</a></li>
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
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>TTL</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Kelas</th>
                      <th>Alamat</th>
                      <th>Wali</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $value): ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $value['nis'] ?></td>
                        <td><?= $value['nm_siswa'] ?></td>
                        <td><?= $value['tmp_lahir'] ?> - <?= $value['tgl_lahir'] ?></td>
                        <td><?= $value['jk'] ?></td>
                        <td><?= $value['agama'] ?></td>
                        <td><?= $value['kelas'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['nm_ortu'] ?></td>
                        <td>
                          <a href="" class="btn btn-info"><i class="fa fa-share-square"></i></a>
                          <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Siswa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="">NIS</label>
              <input type="text" name="nis" class="form-control" placeholder="NIS" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="">Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="">Tempat Lahir</label>
              <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="">Tgl. Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="">
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
            <label for="">Agama</label>
            <input type="text" name="agama" class="form-control" placeholder="Agama" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="">Kelas</label>
            <input type="text" name="kelas" class="form-control" placeholder="Kelas" required="">
          </div>
          
          <div class="form-group col-md-6">
            <label for="">Nama Orang Tua /  Wali</label>
            <input type="text" name="ortu" class="form-control" placeholder="Nama Orang Tua /  Wali" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="">Alamat Orang Tua / Wali</label>
            <input type="text" name="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua / Wali" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="">Telepon Orang Tua / Wali</label>
            <input type="text" name="telepon" class="form-control" placeholder="Telepon Orang Tua / Wali" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="">Pekerjaan Orang Tua / Wali</label>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan Orang Tua / Wali" required="">
          </div>
          <div class="form-group col-md-6">
            <label for="">Agama Orang Tua / Wali</label>
            <input type="text" name="agama_ortu" class="form-control" placeholder="Agama Orang Tua / Wali" required="">
          </div>
        </div>
        <hr>
        <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
        <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
      </form>
      <?php  
      if (isset($_POST['simpan'])) 
      {
        $siswa->add($_POST['nis'],$_POST['nama'],$_POST['alamat'],$_POST['tmp_lahir'],$_POST['tgl_lahir'],$_POST['jk'],$_POST['agama'],$_POST['kelas'],$_POST['ortu'],$_POST['alamat_ortu'],$_POST['telepon'],$_POST['pekerjaan'],$_POST['agama_ortu']);
        echo "<script>alert('Siswa berhasil ditambahkan!');</script>";
        echo "<script>location='siswa.php';</script>";
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