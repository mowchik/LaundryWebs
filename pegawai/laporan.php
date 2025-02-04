<?php 
include 'header.php';
?>
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
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Tanggal Dari</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <input type="date" name="tgl_sampai" class="form-control">
                        </td>
                        <td>
                            <input type="submit" value="Filter" class="btn btn-primary"> 
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br>

    <?php
    if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {

        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            </div>
            <div class="panel-body">
                <a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary">
                    <span class="glyphicon glyphicon-print"></span> Cetak
                </a>

                <br><br>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Berat (kg)</th>
                        <th>Tanggal Selesai</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                    <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi WHERE pelanggan.pelanggan_id = transaksi.pelanggan_id AND date(transaksi.transaksi_tgl) >= '$dari' AND date(transaksi.transaksi_tgl) <= '$sampai' ORDER BY transaksi.transaksi_id DESC");
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                            <td><?php echo $d['transaksi_tgl']; ?></td>
                            <td><?php echo $d['pelanggan_nama']; ?></td>
                            <td><?php echo $d['transaksi_berat']; ?></td>
                            <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                            <td><?php echo "Rp. " . number_format($d['transaksi_harga']) . ",-"; ?></td>
                            <td>
                                <?php 
                                if ($d['transaksi_status'] == "0") {
                                    echo "<div class='label label-warning'>PROSES</div>";
                                } elseif ($d['transaksi_status'] == "1") {
                                    echo "<div class='label label-info'>DICUCI</div>";
                                } elseif ($d['transaksi_status'] == "2") {
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
    <?php
    }
    ?>


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
                    <a href="https://twitter.com/yourlaundrytwitterpage" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-twitter"></i> Twitter</a>
                </p>
            </div>
        </div>
        <hr>
        <p class="text-center">Copyright &copy; 2024 Sistem Informasi Succy Laundry. All rights reserved.</p>
    </div>
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>