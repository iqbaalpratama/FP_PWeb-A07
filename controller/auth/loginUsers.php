<?php
    include 'dbConnection.php';
    session_start();
    $arr = loginUsers(isset($_POST['Submit']));
    if(mysqli_num_rows($arr) == 1){
        $arr2 = mysqli_fetch_array($arr);
        $_SESSION["id"]=$arr2[0]["id"];
        $_SESSION["username"] = true;
        $_SESSION["role"] = "Users";
        $_SESSION["sukses"] = "Sukses melakukan login";
        header('Location: ../../dashboard_user/index.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan login";
        header('Location: ../../dashboard/auth/login-user.php');
    }
    exit();
?>