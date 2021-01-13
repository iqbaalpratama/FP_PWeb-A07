<?php
    include 'dbConnection.php';
    session_start();

    if(updateTransaksiPengepul(isset($_POST['Update'])) > 0){
        $_SESSION["sukses"] = "Transaksi berhasil diupdate";
        // echo "Transaksi berhasil diupdate";
    }else {
        $_SESSION["gagal"] = "Transaksi gagal diupdate";
        // echo "Transaksi berhasil gagal";
    }

     header('Location: ../../dashboard/transaksi/admin_view_transaksi_pengepul.php');
    exit();
?>