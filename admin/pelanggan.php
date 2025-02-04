<?php
include '../koneksi.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
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
            max-width: 800px;
            margin: 50px auto; 
        }
        table {
            width: 100%; 
            margin-top: 20px; 
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4 class="data-pelanggan">Data Pelanggan</h4>
        </div>
        <div class="panel-body">
            <a href="pelanggan_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="width: 1%">No</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Alamat</th> 
                    <th colspan="2" style="width: 15%">Opsi</th>
                </tr>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY pelanggan_id DESC LIMIT 10");
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($d['pelanggan_nama']); ?></td>
                    <td><?php echo htmlspecialchars($d['pelanggan_hp']); ?></td>
                    <td><?php echo htmlspecialchars($d['pelanggan_alamat']); ?></td>
                    <td><a href="pelanggan_edit.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-info pull-right">EDIT</a></td>
                    <td><a href="pelanggan_hapus.php?id=<?php echo $d['pelanggan_id']; ?>" class="btn btn-sm btn-danger pull-right">HAPUS</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>