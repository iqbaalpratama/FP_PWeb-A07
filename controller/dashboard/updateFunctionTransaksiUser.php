<?php
    include 'dbconnection.php';
    session_start();

    if(updateGuest(isset($_POST['Update'])) > 0){
        $_SESSION["sukses"] = "Transaksi berhasil diupdate";
    }else {
        $_SESSION["gagal"] = "Transaksi gagal diupdate";
    }

    header('Location: ../../dashboard/transaksi/admin_view_transaksi_pengepul');
    exit();
?>