<?php
    include 'dbConnection.php';
    session_start();

    if(updateTransaksiUser(isset($_POST['Update'])) > 0){
        $_SESSION["sukses"] = "Transaksi berhasil diupdate";
    }else {
        $_SESSION["gagal"] = "Transaksi gagal diupdate";
    }

    header('Location: ../../dashboard/transaksi/admin_view_transaksi_user.php');
    exit();
?>