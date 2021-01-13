<?php
    include 'dbConnection.php';
    session_start();
    $arr = loginUsers(isset($_POST['Submit']));
    if(mysqli_num_rows($arr) == 1){
        $arr2 = mysqli_fetch_array($arr);
        $_SESSION["id"]=$arr2[0]["u_id"];
        $_SESSION["username"] = true;
        $_SESSION["role"] = "Users";
        $_SESSION["sukses"] = "Sukses melakukan login";
        header('Location: ../../dashboard_user/transaksi/view_transaksi_user.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan login";
        header('Location: ../../dashboard/auth/login-user.php');
    }
    exit();
?>