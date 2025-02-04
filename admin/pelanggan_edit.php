<?php
include '../koneksi.php';
include "header.php"; 

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pelanggan_id='$id'");
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "Customer not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE pelanggan SET pelanggan_nama='$nama', pelanggan_hp='$hp', pelanggan_alamat='$alamat' WHERE pelanggan_id='$id'");

    header("location:pelanggan.php");
    exit;
}
?>

<style>
.tambah-pelanggan {
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
    max-width: 400px; 
    margin: 50px auto;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"] {
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
    color: #fff;
    background-color: #769FCD;
    border-width: 0;
}

.btn-primary:hover {
    background-color: #466f9d; 
}

.btn-danger {
    color: #fff;
    background-color: #d9534f; 
    border-width: 0;
}

.btn-danger:hover {
    background-color: #b94440;
}
</style>

<div class="container">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="tambah-pelanggan">Edit Data Pelanggan</h4>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data['pelanggan_nama']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>HP</label>
                        <input type="text" name="hp" class="form-control" value="<?php echo htmlspecialchars($data['pelanggan_hp']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo htmlspecialchars($data['pelanggan_alamat']); ?>" required>
                    </div>
                    <br>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='pelanggan.php'">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>