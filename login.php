<?php  
include 'config/class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SPK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	  <link rel="icon" href="media/icon/beasiswa2.png" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<form method="post">
						<div class="card-body">
							<img src="media/icon/beasiswa.png" alt="" class="img-fluid mb-4">
							<h4 class="mb-3 f-w-400">LOGIN</h4>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-user"></i></span>
								</div>
								<input type="text" name="username" class="form-control" placeholder="Username" required="">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password" required="">
							</div>
							<button name="login" class="btn btn-block btn-primary mb-4">LOGIN</button>
						</div>
						<?php  
						if (isset($_POST['login'])) 
						{
							$hasil = $user->login($_POST['username'],$_POST['password']);
							if ($hasil=="sukses") 
							{
								echo "<script>location='./';</script>";
							}
							else
							{
								echo "<script>alert('Username atau password salah!');</script>";
								echo "<script>location='login.php';</script>";
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/waves.min.js"></script>
</body>
</html>
