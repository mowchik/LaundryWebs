<?php
include '../koneksi.php'; 
$id = $_GET['id'];

if (isset($id) && is_numeric($id)) {
    $delete_query_pakaian = "DELETE FROM pakaian WHERE transaksi_id = '$id'";

    if (mysqli_query($koneksi, $delete_query_pakaian)) {
        

        $delete_query_transaksi = "DELETE FROM transaksi WHERE transaksi_id = '$id'";

        if (mysqli_query($koneksi, $delete_query_transaksi)) {
            echo "<script>alert('Data transaksi dan pakaian berhasil dihapus.'); window.location='transaksi.php';</script>";
        } else {
            echo "Error deleting record from transaksi: " . mysqli_error($koneksi);
        }

    } else {
        echo "Error deleting record from pakaian: " . mysqli_error($koneksi);
    }

} else {
    echo "Invalid ID.";
}

mysqli_close($koneksi); 
?>
 