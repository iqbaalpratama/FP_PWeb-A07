<?php
    include '../dbConnection.php';

    if(deletePengepul(isset($_POST['Submit'])) > 0) {
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/pengepul.php');
    } else {
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/pengepul.php');
    }

    exit();
?>