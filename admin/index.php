<?php include "../koneksi.php"; include "header.php"; ?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .alert-info {
            background-color: #fff; 
            color: #337ab7;
            border: none; 
        }
        .custom-font {
            font-family: 'Nanum Gothic', sans-serif;
        }
    </style>
</head>
<div class="container">
    <div class="alert alert-info text-center" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
        <h4 class="custom-font" style="margin-bottom: 0px;"><b>Hai Selamat Datang!</b> di Sistem Informasi Laundry</h4>
    </div>

    <div class="panel" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
        <div class="panel-heading">
            <h4><b>Dashboard</b></h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "select * from transaksi where transaksi_status = 0");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Pelanggan
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-retweet"></i>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "select * from transaksi where transaksi_status = 1");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Diproses
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-info-sign"></i>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "select * from transaksi where transaksi_status = 1");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Siap Diambil
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok-circle"></i>
                                <span class="pull-right">
                                    <?php
                                    $proses = mysqli_query($koneksi, "select * from transaksi where transaksi_status = 2");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Selesai
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <div class="panel" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
        <div class="panel-heading">
            <h4><b>Riwayat Transaksi Terakhir</b></h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No </th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (kg)</th>
                    <th>Tanggal Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi, "select * from pelanggan,transaksi where pelanggan.pelanggan_id = transaksi.pelanggan_id order by transaksi_id desc limit 7");
                $no = 1;
                while($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>INVOICE-<?php echo $d['transaksi_id'] ?></td>
                        <td><?php echo $d['transaksi_tgl'] ?></td>
                        <td><?php echo $d['pelanggan_nama'] ?></td>
                        <td><?php echo $d['transaksi_berat'] ?></td>
                        <td><?php echo $d['transaksi_tgl_selesai'] ?></td>
                        <td><?php echo "Rp. ".number_format($d['transaksi_harga']).",." ?></td>
                        <td>
                            <?php 
                                if($d['transaksi_status']=="0") {
                                    echo "<div class='label label-warning'>PROSES</div>";
                                } elseif ($d['transaksi_status']=="1") {
                                    echo "<div class='label label-info'>DICUCI</div>";
                                } elseif ($d['transaksi_status']=="2") {
                                    echo "<div class='label label-success'>SELESAI</div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <style>
        .footer {
            background-color: #f7f7f7;
            padding: 20px 0;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }

        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer .row {
            margin-bottom: 20px;
        }

        .footer .col-md-4 {
            margin-bottom: 20px;
        }

        .footer h4 {
            font-weight: bold;
            margin-top: 0;
        }

        .footer p {
            margin-bottom: 20px;
        }

        .footer hr {
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }

        .footer p.text-center {
            margin-bottom: 0;
        }
        .btn-primary {
            color: #fff;
            background-color: #769FCD;
            border-width: 0; 
        }
        .custom-footer {
            background-color: #fff;
        }
    </style>

    <footer class="footer custom-footer" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Tentang Kami</h4>
                    <p>Di Succy Laundry, kami berkomitmen untuk memberikan layanan laundry berkualitas tinggi. Dengan pengalaman dan teknologi terkini, tim profesional kami siap menjaga pakaian Anda agar tetap bersih dan terawat. Bergabunglah dengan pelanggan puas kami dan rasakan layanan cepat serta terpercaya!</p>
                </div>
                <div class="col-md-4">
                    <h4>Hubungi Kami</h4>
                    <p>
                        <i class="glyphicon glyphicon-map-marker"></i> Jalan Raya No. 123, Ngabean<br>
                        <i class="glyphicon glyphicon-phone"></i> 021-12345678<br>
                        <i class="glyphicon glyphicon-envelope"></i> <a href="mailto:info@laundry.com">info@succylaundry.com</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Social Media</h4>
                    <p>
                        <a href="https://www.facebook.com/yourlaundryfacebookpage" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-facebook"></i> Facebook</a>
                        <a href="https://www.instagram.com/cymowchie/profilecard/?igsh=eG15N2ZrNmxuNDhh" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-instagram"></i> Instagram</a>
                        <a href="https://twitter.com/your laundrytwitterpage" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-twitter"></i> Twitter</a>
                    </p>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright &copy; 2024 Sistem Informasi Succy Laundry. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 3000,
            once: true,
        });
    </script>
</body>
</html>