<?php
include '../koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $pelanggan = $_POST['pelanggan'];
    $berat = $_POST['berat'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];
    
   
    $updateTransaksi = mysqli_query($koneksi, "UPDATE transaksi SET 
        pelanggan_id='$pelanggan', 
        transaksi_berat='$berat', 
        transaksi_tgl_selesai='$tgl_selesai', 
        transaksi_status='$status' 
        WHERE transaksi_id='$id'");

   
    if ($updateTransaksi) {
       
        $jumlahPakaian = $_POST['jumlah_pakaian'];
        $jenisPakaian = $_POST['jenis_pakaian'];

        
        foreach ($jenisPakaian as $index => $jenis) {
            $jumlah = $jumlahPakaian[$index];
           
            $insertPakaian = mysqli_query($koneksi, "INSERT INTO pakaian (transaksi_id, pakaian_jenis, pakaian_jumlah) VALUES ('$id', '$jenis', '$jumlah')");
        }

        
        header('Location: transaksi.php?message=Transaksi berhasil diperbarui');
        exit();
    } else {
       
        echo "Error updating transaction: " . mysqli_error($koneksi);
    }
} else {
    
    header('Location: transaksi.php');
    exit();
}
?>