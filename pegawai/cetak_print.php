<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Laundry</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <style>
        body {
            font-family: 'Nanum Gothic', sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .table th, .table td {
            text-align: left;
        }
        .label {
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
        }
        .label-warning {
            background-color: #f0ad4e;
        }
        .label-info {
            background-color: #5bc0de;
        }
        .label-success {
            background-color: #5cb85c;
        }
        @media print {
            .btn {
                display: none; 
            }
        }
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
include '../koneksi.php';

if (isset($_GET['dari']) && isset($_GET['sampai'])) {
    $dari = $_GET['dari'];
    $sampai = $_GET['sampai'];

    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi, pelanggan WHERE transaksi.pelanggan_id = pelanggan.pelanggan_id AND date(transaksi.transaksi_tgl) >= '$dari' AND date(transaksi.transaksi_tgl) <= '$sampai' ORDER BY transaksi.transaksi_id DESC");

    if (mysqli_num_rows($transaksi) > 0) {
        echo '<div class="container">';
        echo '<center><h2>DATA LAPORAN TRANSAKSI LAUNDRY</h2></center>';
        echo '<h4>Periode: <b>' . $dari . '</b> sampai <b>' . $sampai . '</b></h4>';
        echo '<br>';

        while ($t = mysqli_fetch_array($transaksi)) {
            echo '<h3>INVOICE_' . $t['transaksi_id'] . '</h3>';
            echo '<table class="table">';
            echo '<tr><th>Tgl. Laundry</th><th>:</th><td>' . $t['transaksi_tgl'] . '</td></tr>';
            echo '<tr><th>Nama Pelanggan</th><th>:</th><td>' . $t['pelanggan_nama'] . '</td></tr>';
            echo '<tr><th>HP</th><th>:</th><td>' . $t['pelanggan_hp'] . '</td></tr>';
            echo '<tr><th>Alamat</th><th>:</th><td>' . $t['pelanggan_alamat'] . '</td></tr>';
            echo '<tr><th>Berat Cucian (Kg)</th><th>:</th><td>' . $t['transaksi_berat'] . '</td></tr>';
            echo '<tr><th>Tgl. Selesai</th><th>:</th><td>' . $t['transaksi_tgl_selesai'] . '</td></tr>';
            echo '<tr><th>Status</th><th>:</th><td>';
            if ($t['transaksi_status'] == "0") {
                echo "<div class='label label-warning'>PROSES</div>";
            } else if ($t['transaksi_status'] == "1") {
                echo "<div class='label label-info'>DICUCI</div>";
            } else if ($t['transaksi_status'] == "2") {
                echo "<div class='label label-success'>SELESAI</div>";
            }
            echo '</td></tr>';
            echo '<tr><th>Harga</th><th>:</th><td>' . "Rp. " . number_format($t['transaksi_harga']) . " ,-</td></tr>";
            echo '</table>';

            echo '<h4 class="text-center">Daftar Cucian</h4>';
            echo '<table class="table table-bordered table-striped">';
            echo '<tr><th>Jenis Pakaian</th><th width="20%">Jumlah</th></tr>';

            $id_transaksi = $t['transaksi_id'];
            $pakaian = mysqli_query($koneksi, "SELECT pakaian_jenis, pakaian_jumlah FROM pakaian WHERE transaksi_id='$id_transaksi'");

            while ($p = mysqli_fetch_array($pakaian)) {
                echo '<tr>';
                echo '<td>' . $p['pakaian_jenis'] . '</td>';
                echo '<td>' . $p['pakaian_jumlah'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        echo '<div class="text-center">';
        echo '<a href="laporan.php" class="btn btn-custom">Kembali ke Halaman Laporan</a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="container"><p>Tidak ada data transaksi untuk periode ini.</p></div>';
    }
} else {
    echo '<div class="container"><p>Parameter tanggal tidak valid.</p></div>';
}
?>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>