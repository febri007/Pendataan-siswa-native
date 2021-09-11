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
                                            <h5 class="m-b-10">Ubah Password</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
                                            <li class="breadcrumb-item"><a href="#!">Ubah Password</a></li>
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
                                                <a href="profil.php" class="btn btn-warning"><i class="feather icon-edit"></i> Ubah Profil</a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="alert alert-info"><i class="feather icon-info"></i> Mohon untuk tidak memberi takuhan password Anda kepada siapa pun!</div>
                                            <hr>
                                            <form method="post">
                                                <input type="hidden" name="username" value="<?= $detail->username ?>">
                                                <div class="form-group">
                                                    <label for="">Password Lama</label>
                                                    <input type="text" name="passlama" class="form-control" placeholder="Password Lama" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password Baru</label>
                                                    <input type="text" name="pass" class="form-control" minlength="8" placeholder="Password Baru" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Konfirmasi Password</label>
                                                    <input type="text" name="password" class="form-control" minlength="8" placeholder="Konfirmasi Password" required="">
                                                </div>
                                                <hr>
                                                <button name="kirim" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                                                <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                                            </form>
                                            <?php  
                                            if (isset($_POST['kirim'])) 
                                            {
                                             $pass = $_POST['pass'];
                                             if (strlen($pass) >= 8) 
                                             {
                                              $passbaru = $_POST['pass'];
                                              $konfirm = $_POST['password'];
                                              if ($passbaru == $konfirm) 
                                              {
                                                $hasil=$user->ubahpassword($_POST['passlama'],$_POST['pass'],$_POST['password'],$id_user);
                                                if ($hasil=="sukses") 
                                                {
                                                  echo "<script>alert('Password berhasil diubah!');</script>";
                                                  echo "<script>location='index.php';</script>";
                                              }
                                              else
                                              {
                                                echo "<script>alert('Password gagal diubah, password lama Anda salah!');</script>";
                                                echo "<script>location='ubah_password.php';</script>";
                                            }
                                        }
                                        else
                                        {

                                            echo "<script>alert('Password gagal diubah, konfirmasi password tidak sama!');</script>";
                                            echo "<script>location='ubah_password.php';</script>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<script>alert('Password gagal diubah, password kurang dari 8 karakter!');</script>";
                                        echo "<script>location='ubah_password.php';</script>";
                                    }
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