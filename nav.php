<nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
    <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
        <ul class="nav pcoded-inner-navbar sidenav-inner">
            <li class="nav-item pcoded-menu-caption">
               <label>Navigation</label>
           </li>
           <li class="nav-item">
            <a href="./" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
        </li>
        <?php if ($_SESSION['user']['level']=="Tata Usaha"): ?>
         <li class="nav-item">
            <a href="siswa.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Data Siswa</span></a>
        </li>
        <li class="nav-item">
            <a href="kriteria.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-list"></i></span><span class="pcoded-mtext">Data Kriteria C<sub>i</sub></span></a>
        </li>
        <li class="nav-item">
            <a href="user.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Manajemen User</span></a>
        </li>
        <li class="nav-item">
            <a href="rangking.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Data Rangking</span></a>
        </li>
        <li class="nav-item">
            <a href="laporan.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Laporan</span></a>
        </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="rangking.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Data Rangking</span></a>
        </li>
        <li class="nav-item">
            <a href="laporan.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Laporan</span></a>
        </li>
    <?php endif ?>

    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Pengaturan</span></a>
        <ul class="pcoded-submenu">
            <li><a href="profil.php">Profil</a></li>
            <li><a href="ubah_password.php">Ubah Password</a></li>
        </ul>
    </li>

</ul>
</div>
</nav>