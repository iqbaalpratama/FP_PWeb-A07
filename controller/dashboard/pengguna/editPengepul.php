<?php
    include '../dbConnection.php';

    if(updatePengepul(isset($_POST['Submit'])) > 0) {
        header('Location: ../../../../FP_PWEB-A07/dashboard/pengguna/staff.php');
    } else {
        header('Location: ../../../../FP_PWEB-A07/dashboard/pengguna/staff.php');
    }

    exit();
?>