<?php
    include './dbConnection.php';
    session_start();
    $arr = loginStaff(isset($_POST['Submit']));
    if(mysqli_num_rows($arr) == 1){
        $arr2 = mysqli_fetch_array($arr);
        $_SESSION["id"]=$arr2[0]["id"];
        $_SESSION["username"] = true;
        $_SESSION["role"] = "Staff";
        header('Location: ../../dashboard/index.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan login";
        header('Location: ../../dashboard/auth/login-staff.html');
    }
    exit();
?>