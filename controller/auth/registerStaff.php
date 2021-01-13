<?php
    include 'dbconnection.php';
    session_start();

    if(registerStaff(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Berhasil melakukan register";
        header('Location: ../dashboard/auth/login-staff.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan register";
        header('Location: ../register.php');
    }

    exit();
?>