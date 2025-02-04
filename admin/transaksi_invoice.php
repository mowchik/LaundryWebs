<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laundry</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <style>
        .btn-custom {
            margin-bottom: 1rem;
            background-color: #fff; 
            color: #007bff; 
            border-color: #007bff; 
            padding: 10px 20px; 
            border-radius: 5px; 
            font-size: 14px; 
            transition: background-color 0.3s; 
        }

        .btn-custom:hover {
            background-color: #0056b3; 
            color: white; 
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }

    include '../koneksi.php';
    ?>

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <?php
            $id = $_GET['id'];
            $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi, pelanggan WHERE transaksi_id='$id' AND transaksi.pelanggan_id = pelanggan.pelanggan_id");
            
            if (mysqli_num_rows($transaksi) > 0) {
                while ($t = mysqli_fetch_array($transaksi)) {
            ?>
            <center><h2>INVOICE LAUNDRY</h2></center>
            <h3></h3>

            <a href="transaksi_invoice_cetak.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-print"></i> CETAK</a>

            <br/><br/>

            <table class="table">
                <tr>
                    <th width="20%">No. Invoice</th>
                    <th>:</th>
                    <td>Invoice-<?php echo $t['transaksi_id']; ?></td>
                </tr>
                <tr>
                    <th width="20%">Tgl. Laundry</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_nama']; ?></td>
                </tr>   
                <tr>
                    <th>HP</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_hp']; ?></td>
                </tr>   
                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_alamat']; ?></td>
                </tr>   
                <tr>
                    <th>Berat Cucian (Kg)</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Selesai</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>:</th>
                    <td>
                        <?php
                            if ($t['transaksi_status'] == "0") {
                                echo "<div class='label label-warning'>PROSES</div>";
                            } else if ($t['transaksi_status'] == "1") {
                                echo "<div class='label label-info'>DICUCI</div>";
                            } else if ($t['transaksi_status'] == "2") {
                                echo "<div class='label label-success'>SELESAI </div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td><?php echo "Rp. " . number_format($t['transaksi_harga']) . " ,-"; ?></td>
                </tr>
            </table>

            <br/>

            <h4 class="text-center">Daftar Cucian</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>

                <?php
                $id_transaksi = $t['transaksi_id'];
                $pakaian = mysqli_query($koneksi, "SELECT pakaian_jenis, pakaian_jumlah FROM pakaian WHERE transaksi_id='$id_transaksi'");

                if (!$pakaian) {
                    die("Query Error: " . mysqli_error($koneksi)); 
                }

                while ($p = mysqli_fetch_array($pakaian)) {
                ?>
                <tr>
                    <td><?php echo $p['pakaian_jenis']; ?></td>
                    <td><?php echo $p['pakaian_jumlah']; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>

            <div class="text-center">
                <a href="transaksi.php" class="btn btn-custom">Kembali ke Halaman Transaksi</a>
            </div>

            <?php
                }
            } else {
                echo "<p>Data tidak ditemukan.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>