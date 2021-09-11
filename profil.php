<?php include 'config/class.php'; ?>
<?php include 'head.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'header.php'; ?>
<?php  
$page = '';
$id_user = $_SESSION['user']['id_user'];
$detail = $user->ambil($id_user);
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
                                            <h5 class="m-b-10">Profil</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Profil</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .pp
                            {
                                border-radius: 50%;
                                height: 100px;
                            }
                        </style>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <?php if (empty($detail['foto'])): ?>
                                                <img width="100" class="img-thumbnail pp" src="media/upload-user/no-img.jpg" alt="">
                                                <?php else: ?>
                                                    <img width="100" class="img-thumbnail pp" src="media/upload-user/<?= $detail['foto'] ?>" alt="">
                                                <?php endif ?>
                                                <br><br>
                                                <h5><?= $detail['nama'] ?></h5>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Data Profil</h4>
                                            <hr>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-gruop col-md-6">
                                                        <label for="">Nama Lengkap</label>
                                                        <input type="text" name="nama" value="<?= $detail['nama'] ?>" class="form-control" placeholder="Nama Lengkap" required="">
                                                    </div>
                                                    <div class="form-gruop col-md-6">
                                                        <label for="">Username</label>
                                                        <input type="text" name="username" value="<?= $detail['username'] ?>" class="form-control" placeholder="Username" readonly>
                                                    </div>
                                                    <div class="form-gruop col-md-6">
                                                        <label for="">Telepon</label>
                                                        <input type="number" name="telepon" value="<?= $detail['telepon'] ?>" class="form-control" placeholder="Telepon" required="">
                                                    </div>
                                                    <div class="form-gruop col-md-6">
                                                        <label for="">Jenis Kelamin</label>
                                                        <select name="jk" id="" class="form-control" required="">
                                                            <option value="Laki-Laki" <?php if ($detail['jenis_kelamin']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                                                            <option value="Perempuan" <?php if ($detail['jenis_kelamin']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-gruop col-md-6">
                                                        <label for="">Foto</label>
                                                        <input type="file" name="foto" class="form-control">
                                                    </div>
                                                    <div class="form-gruop col-md-6">
                                                        <label for="">Alamat</label>
                                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required=""><?= $detail['alamat'] ?></textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button name="simpan" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                                                <a href="ubah_password.php" class="btn btn-success"><i class="feather icon-lock"></i> Ubah Password</a>
                                            </form>
                                            <?php  
                                            if (isset($_POST['simpan'])) 
                                            {
                                                $user->profil($_POST['nama'],$_POST['jk'],$_FILES['foto'],$_POST['alamat'],$id_user);
                                                echo "<script>alert('Profil berhasil diperbaharui!');</script>";
                                                echo "<script>location='profil.php';</script>";
                                            }
                                            ?>
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