<?php
    include 'dbconnection.php';
    session_start();

    if(deleteTransaksiUser(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Transaksi berhasil dihapus";
    }else {
        $_SESSION["gagal"] = "Transaksi gagal dihapus";
    }

    header('Location: ../../dashboard/transaksi/admin_view_transaksi_user.php');
    exit();
?>