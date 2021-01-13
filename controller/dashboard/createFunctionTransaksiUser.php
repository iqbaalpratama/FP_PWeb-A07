<?php
    include 'dbConnection.php';

    if(createTransaksiUser(isset($_POST['Submit'])) > 0) {
        header('Location: ../../../../FP_PWeb-A07/dashboard_user/transaksi/view_transaksi_user.php');
    } else {
        header('Location: ../../../../FP_PWeb-A07/dashboard_user/transaksi/view_transaksi_user.php');
    }

    exit();
?>