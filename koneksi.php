<?php
    $koneksi = mysqli_connect("localhost","root","",
    "db_laundry");
    if(mysqli_connect_errno()){
            echo "koneksi gagal :".mysql_connect_error();
    }
?>