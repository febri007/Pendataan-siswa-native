<?php  
if (!isset($_SESSION)) 
{
	session_start();
}
$mysqli = new mysqli("localhost","root","","spkh"); 
date_default_timezone_set('Asia/Jakarta');

class user
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function login($username,$password)
	{
		$username=mysqli_real_escape_string($this->koneksi,$username);
		$password=mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE username='$username' AND password='$enpass'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==0)
		{
			return "gagal";
		}
		else
		{
			$akun=$ambil->fetch_assoc();

			$_SESSION["user"]=$akun;
			return "sukses";
		}
	}
	function get()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user ORDER BY id_user");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function add($nama,$username,$password,$telepon,$jk,$foto,$level,$alamat)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE username='$username'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0) 
		{
			return "gagal";
		}
		else
		{
			$enpass = sha1($password);
			$namafoto = $foto['name'];
			$lokasi = $foto['tmp_name'];
			move_uploaded_file($lokasi, "media/upload-user/$namafoto");
			$this->koneksi->query("INSERT INTO tbl_user (nama,username,password,telepon,jenis_kelamin,foto,alamat,level) VALUES ('$nama','$username','$enpass','$telepon','$jk','$namafoto','$alamat','$level')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
	}
	function ubahpassword($passlama,$pass,$password)
	{
		$passwordlama= mysqli_real_escape_string($this->koneksi,$passlama);
		$sip = sha1($passwordlama);
		$ambil = $this->koneksi->query("SELECT * FROM user WHERE password='$sip'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0 && strlen($pass) >= 8 && $pass == $password)
		{
			$pass = sha1($pass);
			$this->koneksi->query("UPDATE user SET password='$pass' ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function ambil($id_user)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user WHERE id_user='$id_user' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function foto($id_user)
	{
		$ambil = $this->koneksi->query("SELECT foto FROM user WHERE id_user='$id_user' ");
		$pecahdata = $ambil->fetch_assoc();
		return json_encode($pecahdata);	
	}
	function edit($nama,$username,$telepon,$jk,$foto,$level,$alamat,$id_user)
	{
		$namafoto=$foto['name'];
		$lokasi=$foto['tmp_name'];
		if (!empty($namagambar)) {
			move_uploaded_file($lokasi, "media/upload-user/$namafoto");
			$this->koneksi->query("UPDATE tbl_user SET nama='$nama', username='$username', telepon='$telepon',  jenis_kelamin='$jk', foto='$namafoto', alamat='$alamat', level='$level' WHERE id_user='$id_user'");
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_user SET nama='$nama', username='$username', telepon='$telepon',  jenis_kelamin='$jk', alamat='$alamat', level='$level' WHERE id_user='$id_user'");
		}
	}
	function ubah($nama,$username,$email,$jk,$level,$foto,$id_user)
	{
		$namagambar=$foto['name'];
		$lokasi=$foto['tmp_name'];
		$tgl = date('Ymd');
		$fix = $tgl.$namagambar;
		if (!empty($namagambar)) {
			$adminlama=$this->ambil($id_user);
			$gambarlama=$adminlama['foto'];
			if (file_exists("../upload/img-user/$gambarlama")) {
				unlink("../upload/img-user/$gambarlama");
			}
			move_uploaded_file($lokasi, "../upload/img-user/$fix");
			$this->koneksi->query("UPDATE user SET nama='$nama', username='$username', email='$email',  foto='$fix', level='$level', jenis_kelamin='$jk' WHERE id_user='$id_user'");
		}
		else
		{
			$this->koneksi->query("UPDATE user SET  nama='$nama', username='$username', email='$email', level='$level', jenis_kelamin='$jk' WHERE id_user='$id_user'" ) ;
		}
	}
	function totuser()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_user");
		$pecahdata = $ambil->num_rows;
		return $pecahdata;
	}
	function delete($id_user)
	{
		$this->koneksi->query("DELETE FROM tbl_user WHERE id_user='$id_user'");
	}
}

class kriteria
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	function detail($id_kriteria)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_kriteria WHERE id_kriteria='$id_kriteria' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function get()
	{
		$semuadata=array();
		$ambildata = $this->koneksi-> query("SELECT * FROM tbl_kriteria");
		while ($pecahdata=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nama_kriteria,$tipe_kriteria,$bobot_kriteria)
	{
		$id_user = $_SESSION['user']['id_user'];
		$this->koneksi->query("INSERT INTO tbl_kriteria (nama_kriteria,tipe_kriteria,bobot_kriteria,id_user) VALUES ('$nama_kriteria','$tipe_kriteria','$bobot_kriteria','$id_user')")or die(mysqli_error($this->koneksi));
		return "sukses";
	}

	function edit($nama_kriteria,$tipe_kriteria,$bobot_kriteria,$id_kriteria)
	{
		$id_user = $_SESSION['user']['id_user'];
		$this->koneksi->query("UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria', tipe_kriteria='$tipe_kriteria', bobot_kriteria='$bobot_kriteria', id_user='$id_user' WHERE id_kriteria='$id_kriteria'")or die(mysqli_error($this->koneksi));
	}
	function totkriteria()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_kriteria");
		$pecahdata = $ambil->num_rows;
		return $pecahdata;
	}
	function delete($id_kriteria)
	{
		$this->koneksi->query("DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
	}

	function sub($id_kriteria)
	{
		$semuadata=array();
		$ambildata = $this->koneksi-> query("SELECT * FROM tbl_sub_kriteria WHERE id_kriteria='$id_kriteria'");
		while ($pecahdata=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add_sub($range,$nilai,$id_kriteria)
	{
		$this->koneksi->query("INSERT INTO tbl_sub_kriteria (id_kriteria,range_n,kategori,nilai) VALUES ('$id_kriteria','$range','$range','$nilai')")or die(mysqli_error($this->koneksi));
		return "sukses";
	}

	function delete_sub($id_sub_kriteria)
	{
		$this->koneksi->query("DELETE FROM tbl_sub_kriteria WHERE id_sub_kriteria='$id_sub_kriteria'");
	}
}

class phone
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	function detail($id_phone)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_phone WHERE id_phone='$id_phone' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function get()
	{
		$semuadata=array();
		$ambildata = $this->koneksi-> query("SELECT * FROM tbl_phone");
		while ($pecahdata=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nama,$harga,$ram,$memory,$kamera,$layar,$foto)
	{
		$namafoto = $foto['name'];
		if (empty($namafoto)) 
		{
			$id_user = $_SESSION['user']['id_user'];
			$this->koneksi->query("INSERT INTO tbl_phone (nama_phone,harga_phone,ram,memory_internal,kamera,layar,id_user) VALUES ('$nama','$harga','$ram','$memory','$kamera','$layar','$id_user')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
		else
		{
			$lokasi = $foto['tmp_name'];
			$id_user = $_SESSION['user']['id_user'];
			move_uploaded_file($lokasi, "media/upload-phone/$namafoto");
			$this->koneksi->query("INSERT INTO tbl_phone (nama_phone,harga_phone,ram,memory_internal,kamera,layar,foto_phone,id_user) VALUES ('$nama','$harga','$ram','$memory','$kamera','$layar','$namafoto','$id_user')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
	}

	function edit($nama,$harga,$ram,$memory,$kamera,$layar,$foto,$id_phone)
	{
		$id_user = $_SESSION['user']['id_user'];
		$namafoto=$foto['name'];
		if (!empty($namafoto)) {
			$lokasi=$foto['tmp_name'];
			move_uploaded_file($lokasi, "media/upload-phone/$namafoto");
			$this->koneksi->query("UPDATE tbl_phone SET nama_phone='$nama', harga_phone='$harga', ram='$ram',  memory_internal='$memory', kamera='$kamera', layar='$layar', foto_phone='$namafoto', id_user='$id_user' WHERE id_phone='$id_phone'")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_phone SET nama_phone='$nama', harga_phone='$harga', ram='$ram',  memory_internal='$memory', kamera='$kamera', layar='$layar', id_user='$id_user' WHERE id_phone='$id_phone'")or die(mysqli_error($this->koneksi));
		}
	}

	function delete($id_phone)
	{
		$detail = $this->detail($id_phone);
		if (!empty($detail['foto_phone'])) 
		{
			unlink('media/upload-phone/'.$detail["foto_phone"]);
		}
		$this->koneksi->query("DELETE FROM tbl_phone WHERE id_phone='$id_phone'");
	}

	function totphone()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_phone");
		$pecahdata = $ambil->num_rows;
		return $pecahdata;
	}
}

class siswa
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	function detail($id_siswa)
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_siswa LEFT JOIN tbl_ortu ON tbl_siswa.id_ortu=tbl_ortu.id_ortu WHERE id_siswa='$id_siswa' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function get()
	{
		$semuadata=array();
		$ambildata = $this->koneksi-> query("SELECT * FROM tbl_siswa LEFT JOIN tbl_ortu ON tbl_siswa.id_ortu=tbl_ortu.id_ortu ORDER BY id_siswa ");
		while ($pecahdata=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function add($nis,$nama,$alamat,$tmp_lahir,$tgl_lahir,$jk,$agama,$kelas,$ortu,$alamat_ortu,$telepon,$pekerjaan,$agama_ortu)
	{

		$enpass = sha1($nis);
		$this->koneksi->query("INSERT INTO tbl_ortu (nm_ortu,alamat_ortu,telp_ortu,pekerjaan,agama_ortu) VALUES ('$ortu','$alamat_ortu','$telepon','$pekerjaan','$agama_ortu')")or die(mysqli_error($this->koneksi));
		$id_ortu = $this->koneksi->insert_id;
		$this->koneksi->query("INSERT INTO tbl_siswa (nis,password,nm_siswa,alamat,tmp_lahir,tgl_lahir,jk,agama,kelas,id_ortu) VALUES ('$nis','$enpass','$nama','$alamat','$tmp_lahir','$tgl_lahir','$jk','$agama','$kelas','$id_ortu')")or die(mysqli_error($this->koneksi));
		return "sukses";
	}

	function edit($nama,$harga,$ram,$memory,$kamera,$layar,$foto,$id_phone)
	{
		$id_user = $_SESSION['user']['id_user'];
		$namafoto=$foto['name'];
		if (!empty($namafoto)) {
			$lokasi=$foto['tmp_name'];
			move_uploaded_file($lokasi, "media/upload-phone/$namafoto");
			$this->koneksi->query("UPDATE tbl_phone SET nama_phone='$nama', harga_phone='$harga', ram='$ram',  memory_internal='$memory', kamera='$kamera', layar='$layar', foto_phone='$namafoto', id_user='$id_user' WHERE id_phone='$id_phone'")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE tbl_phone SET nama_phone='$nama', harga_phone='$harga', ram='$ram',  memory_internal='$memory', kamera='$kamera', layar='$layar', id_user='$id_user' WHERE id_phone='$id_phone'")or die(mysqli_error($this->koneksi));
		}
	}

	function delete($id_phone)
	{
		$detail = $this->detail($id_phone);
		if (!empty($detail['foto_phone'])) 
		{
			unlink('media/upload-phone/'.$detail["foto_phone"]);
		}
		$this->koneksi->query("DELETE FROM tbl_phone WHERE id_phone='$id_phone'");
	}

	function totsiswa()
	{
		$ambil = $this->koneksi->query("SELECT * FROM tbl_siswa");
		$pecahdata = $ambil->num_rows;
		return $pecahdata;
	}
}

class rangking
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi=$mysqli;
	}

	function get()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT tr.*, ts.nm_siswa, tk.nama_kriteria FROM tbl_rangking tr LEFT JOIN tbl_kriteria tk ON tr.id_kriteria=tk.id_kriteria LEFT JOIN tbl_siswa ts ON tr.id_siswa=ts.id_siswa ORDER BY id_rangking");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}

	function show_nilai($id_siswa)
	{
		$semuadata=array();
		$ambildata = $this->koneksi-> query("SELECT * FROM tbl_rangking LEFT JOIN tbl_kriteria ON tbl_rangking.id_kriteria=tbl_kriteria.id_kriteria WHERE id_siswa='$id_siswa'");
		while ($pecahdata=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}

	function readMax($id_kriteria)
	{
		$ambil = $this->koneksi->query("SELECT max(nilai_rangking) as rmax FROM tbl_rangking WHERE id_kriteria='$id_kriteria' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function readMin($id_kriteria)
	{
		$ambil = $this->koneksi->query("SELECT min(nilai_rangking) as rmin FROM tbl_rangking WHERE id_kriteria='$id_kriteria' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function add($id_siswa,$id_kriteria,$nilai)
	{
		$id_user = $_SESSION['user']['id_user'];
		$jumlah_dipilih = count($id_kriteria);
		for($i=0; $i<=$jumlah_dipilih; $i++)
		{
			$id = $id_kriteria[$i];
			$n = $nilai[$i];
			$this->koneksi->query("INSERT INTO tbl_rangking (id_siswa,id_kriteria,nilai_rangking,id_user) VALUES ('$id_siswa','$id','$n','$id_user')")or die(mysqli_error($this->koneksi));
		}
		return "sukses";

	}
}

$kriteria = new kriteria($mysqli);
$user = new user($mysqli);
$rangking = new rangking($mysqli);
$phone = new phone($mysqli);
$siswa = new siswa($mysqli);