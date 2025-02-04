<?php
include '../koneksi.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="id">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <style>
        .btn-info {
            background-color: #769FCD; 
            color: white; 
            border: none;
        }
        .btn-info:hover {
            background-color: #466f9d; 
        }
        .data-pelanggan {
            font-size: 20px;
            line-height: 20px;
            font-family: 'Nanum Gothic', sans-serif;
            font-weight: bold; 
            text-align: center;
        }
        .container {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            background-color: white; 
            max-width: 2000px;
            margin: 50px auto;
        }
        .table {
            width: 100%;
            margin-top: 20px; 
        }
        .btn-margin {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="data-pelanggan">Data Transaksi</h4> 
        </div>
        <div class="panel-body">
            <a href="transaksi_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
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
                        <th>Opsi</th>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="transaksi_invoice.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-warning btn-margin">INVOICE</a>
                                    <a href="transaksi_edit.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-info btn-margin">EDIT</a>
                                    <a href="transaksi_hapus.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-danger btn-margin">BATALKAN</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>