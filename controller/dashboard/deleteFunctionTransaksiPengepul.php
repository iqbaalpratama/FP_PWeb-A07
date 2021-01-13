<?php
    include 'dbConnection.php';
    session_start();

    if(deleteTransaksiPengepul(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Transaksi berhasil dihapus";
        header('Location: ../../dashboard/transaksi/admin_view_transaksi_pengepul.php');
    }else {
        $_SESSION["gagal"] = "Transaksi gagal dihapus";
    }


    exit();
?>