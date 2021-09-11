<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="media/icon/beasiswa.png" alt="" class="logo">
            <img src="media/icon/beasiswa.png" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            
            <li>
                <div class="dropdown drp-user">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="media/icon/user.jpg" class="img-radius wid-40" alt="User-Profile-Image"> <?= $_SESSION['user']['nama'] ?> <i class="feather icon-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="media/icon/user.jpg" class="img-radius" alt="User-Profile-Image">
                            <span><?= $_SESSION['user']['nama'] ?></span>
                            <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="logout.php" class="dropdown-item"><i class="feather icon-user"></i> Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>