<?php
    include '../dbConnection.php';

    if(createPengepul(isset($_POST['Submit'])) > 0) {
        $_SESSION["sukses"] = "Data pengepul berhasil dibuat";
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/pengepul.php');
    } else {
        $_SESSION["sukses"] = "Data pengepul gagal dibuat";
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/pengepul.php');
    }

    exit();
?>