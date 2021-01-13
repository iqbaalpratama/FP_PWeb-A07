<?php
    include '../dbConnection.php';

    if(createSampah(isset($_POST['Submit'])) > 0) {
        header('Location: ../../../../FP_PWeb-A07/dashboard/sampah/sampah.php');
    } else {
        header('Location: ../../../../FP_PWeb-A07/dashboard/sampah/sampah.php');
    }

    exit();
?>