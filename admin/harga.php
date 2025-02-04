<?php
include '../koneksi.php';
include 'header.php';

$notification = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga = $_POST['harga'];
    
    $query = "UPDATE harga SET harga_per_kilo = '$harga'";
    mysqli_query($koneksi, $query);

    
    if (mysqli_affected_rows($koneksi) > 0) {
        $notification = "<div class='alert alert-success'>Harga berhasil diperbarui!</div>";
    } else {
        
        $error = mysqli_error($koneksi);
        $notification = "<div class='alert alert-danger'>Gagal memperbarui harga: $error</div>";
    }
}


$result = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga LIMIT 1");
$row = mysqli_fetch_assoc($result);
$harga = $row['harga_per_kilo'] ?? '';
?>

<style>
.container {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); 
    padding: 20px; 
    border-radius: 10px; 
    background-color: white;
    max-width: 400px; 
    margin: 50px auto;
}


.panel-heading {
    text-align: center;
    margin: 20px 0; 
}
.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="number"] {
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
.abtn-primary:hover {
   background-color: #466f9d; 
}

.notification {
    max-width: 400px; 
    margin: 10px auto; 
}
</style>

<?php if ($notification): ?>
    <div class="notification"><?php echo $notification; ?></div>
<?php endif; ?>

<div class="container">
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-heading">
            <h4 style="font-family: 'Nanum Gothic', sans-serif; font-weight: bold;">Pengaturan Harga</h4>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                    <label style="font-family: 'Nanum Gothic', sans-serif; font-weight: bold;">Harga per kilo</label>
                        <input type="number" name="harga" class="form-control" value="<?php echo htmlspecialchars($harga); ?>" required>
                    </div>
                    <input type="submit" value="Ubah harga" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>