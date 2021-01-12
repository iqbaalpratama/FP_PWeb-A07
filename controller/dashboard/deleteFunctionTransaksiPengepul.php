<?php
    include 'dbconnection.php';
    session_start();

    if(deleteTransaksiPengepul(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Transaksi berhasil dihapus";
    }else {
        $_SESSION["gagal"] = "Transaksi gagal dihapus";
    }

    header('Location: ../../dashboard/transaksi/admin_view_transaksi_pengepul.php');
    exit();
?>