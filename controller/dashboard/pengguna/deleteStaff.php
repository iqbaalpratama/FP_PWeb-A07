<?php
    include '../dbConnection.php';

    if(deleteStaff(isset($_POST['Submit'])) > 0) {
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/staff.php');
    } else {
        header('Location: ../../../../FP_PWeb-A07/dashboard/pengguna/staff.php');
    }

    exit();
?>