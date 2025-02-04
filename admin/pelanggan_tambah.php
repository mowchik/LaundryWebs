<?php
include "header.php";
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
</style>
<div class="container">
    <br><br><br>    
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-heading">
                <h4 class="tambah-pelanggan">Tambah Pelanggan Baru</h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="pelanggan_aksi.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>HP</label>
                        <input type="text" name="hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <br>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>