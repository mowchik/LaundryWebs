<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:.../index.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi SuccyLaundry</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    
    <style>
        .navbar {
            background-color: #ffffff !important;
            border-color: #e7e7e7;
            box-shadow: none;
        }
        .navbar-brand {
            color: #769fcd; 
            font-family: 'Nanum Gothic', sans-serif;
        }
        .navbar-brand strong {
            color: #FFD43B; 
        }
        .navbar-default .navbar-nav > li > a {
            color: #4175af;
        }
        .navbar-default .navbar-nav > li > a:hover {
            background-color: #f8f8f8;
            color: #007bff;
        }
        .navbar-default .navbar-nav > li > a i {
            color: #4175af;
        }
        .navbar-default .navbar-nav > li > a:hover i {
            color: #007bff;
        }
        .navbar-default .navbar-toggle {
            border-color: #ddd;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color: #337ab7;
        }
    </style>
</head>
<body style="background: #D6E6F2;">
    <nav class="navbar navbar-default" style="border-radius: 0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>               
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <strong style="color: #769fcd;">Succy</strong><strong style="color: #FFD43B;">Laundry</strong>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><i class="glyphicon glyphicon-stats"></i> Dashboard</a></li>
                    <li><a href="pelanggan.php"><i class="glyphicon glyphicon-user"></i> Pelanggan</a></li>
                    <li><a href="transaksi.php"><i class="glyphicon glyphicon-list-alt"></i> Transaksi</a></li>
                    <li><a href="laporan.php"><i class="glyphicon glyphicon-file"></i> Laporan</a></li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="glyphicon glyphicon-wrench"></i> Pengaturan <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="harga.php"><i class="glyphicon glyphicon-usd"></i> Pengaturan Harga</a></li>
                                <li><a href="ganti_password.php"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
                            </ul>
                        </li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text" style="font-family: 'Nanum Gothic', sans-serif; font-size: 1.2em; color: #337ab7;">
                            Halo, <b style="color: #FFD43B;"><?php echo $_SESSION['username']; ?></b>!
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>                 