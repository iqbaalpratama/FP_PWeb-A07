<?php
    include 'dbConnection.php';
    session_start();

    if(mysqli_num_rows(loginStaff(isset($_POST['Submit']))) == 1){
        $_SESSION["username"] = true;
        $_SESSION["role"] = "Staff";
        header('Location: ../dashboard/pengguna/staff.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan login";
        // header('Location: ../dashboardlogin.php');
    }
    exit();
?>