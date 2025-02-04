<?php
include '../koneksi.php';

$id = $_GET['id'];

if (isset($id) && is_numeric($id)) {
    
    $delete_query_transaksi = "DELETE FROM transaksi WHERE pelanggan_id='$id'";
    
   
    $delete_query_pelanggan = "DELETE FROM pelanggan WHERE pelanggan_id='$id'";

   
    if (mysqli_query($koneksi, $delete_query_transaksi)) {
        
        if (mysqli_query($koneksi, $delete_query_pelanggan)) {
            echo "<script>alert('Data pelanggan berhasil dihapus.');window.location='pelanggan.php';</script>";
        } else {
            echo "Error deleting record from pelanggan: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error deleting record from transaksi: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid ID.";
}

mysqli_close($koneksi);
?>