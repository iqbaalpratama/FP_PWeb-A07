<?php
    include 'dbconnection.php';
    session_start();

    if(registerUsers(isset($_POST['Submit'])) > 0){
        $_SESSION["sukses"] = "Berhasil melakukan register";
        header('Location: ../../dashboard/auth/login-user.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan register";
        header('Location: ../../dashboard/auth/register-user.php');
    }

    exit();
?>