<?php
include '../koneksi.php';
include 'header.php';
?>

<style>
.tambah-transaksi {
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
    max-width: 600px; 
    margin: 50px auto; 
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"], input[type="date"], input[type="number"], select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    padding: 10px 15px; 
    border-radius: 5px; 
    cursor: pointer;
}

.btn-primary {
    background-color: #769FCD; 
    color: white; 
    border: none;
}

.btn-primary:hover {
    background-color: #466f9d; 
}
</style>

<div class="container">
    <br><br><br>    
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="tambah-transaksi">Transaksi Laundry Baru</h4>
            </div>
            <div class="panel-body">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/>
                <br/>
                <form method="post" action="transaksi_aksi.php">
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select class="form-control" name="pelanggan" required="required">
                            <option value="">- Pilih Pelanggan </option>
                            <?php
                            $data = mysqli_query($koneksi,"select * from pelanggan");
                            while($d=mysqli_fetch_array($data)){
                            ?>
                            <option value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required">
                    </div>

                    <div class="form-group">
                    <label>Tgl. Selesai</label>
                    <input type="date" class="form-control" name="tgl_selesai" required="required">
                </div>

                <br/>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis _pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                    </tr>
                </table>

                <div class="form-group alert alert-info">
                    <label>Status</label>
                    <select name="transaksi_status" class="form-control" required>
                        <option value="0">PROSES</option>
                        <option value="1">DI CUCI</option>
                        <option value="2">SELESAI</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>