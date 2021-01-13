<?php
    include '../dbConnection.php';

    if(updatePengepul(isset($_POST['Submit'])) > 0) {
        $_SESSION["sukses"] = "Data pengepul berhasil diedit";
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/pengepul.php');
    } else {
        $_SESSION["gagal"] = "Data pengepul gagal diedit";
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/pengepul.php');
    }

    exit();
?>