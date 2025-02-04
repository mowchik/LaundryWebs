<?php
include '../koneksi.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $username = $_SESSION['username']; 

    $query = "SELECT password FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    
    if ($row && md5($password_lama) === $row['password']) {

        $password_baru_hash = md5($password_baru); 
        $update_query = "UPDATE admin SET password = '$password_baru_hash' WHERE username = '$username'";
        mysqli_query($koneksi, $update_query);

        
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<div class='alert alert-success'>Password berhasil diperbarui!</div>";
        } else {
            $error = mysqli_error($koneksi);
            echo "<div class='alert alert-danger'>Gagal memperbarui password. Error: $error</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Password lama salah!</div>";
    }
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

input[type="password"] {
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
                <h4 class="tambah-pelanggan">Ganti Password</h4>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" required>
                    </div>
                    <br>
                    <input type="submit" value="Ganti Password" class="btn btn-primary">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>