<?php

    $db = mysqli_connect("localhost", "root", "", "banksampah");
    if( !$db ) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function getAll($query) {
        global $db;
        $all_staff = mysqli_query($db, $query);

        dbClose();
        return $all_staff;
    }

    function updateStaff($request) {
        global $db;

        $s_id = $_POST['s_id'];
        $s_nama = $_POST['s_nama'];
        $bank = $_POST['bank'];
        $s_alamat = $_POST['s_alamat'];
        $s_telepon = $_POST['s_telepon'];
        
        mysqli_query($db, "UPDATE staff SET b_id = '$bank', s_nama = '$s_nama', s_alamat = '$s_alamat', s_telepon = '$s_telepon' WHERE s_id = '$s_id'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function createStaff($request) {
        global $db;

        $s_id = $_POST['s_id'];
        $s_nama = $_POST['s_nama'];
        $bank = $_POST['bank'];
        $s_alamat = $_POST['s_alamat'];
        $s_telepon = $_POST['s_telepon'];
        
        mysqli_query($db, "INSERT INTO staff (b_id, s_nama, s_alamat, s_telepon) VALUES ('$bank', '$s_nama', '$s_alamat', '$s_telepon')");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function deleteStaff($request) {
        global $db;

        $s_id = $_POST['s_id'];
        
        mysqli_query($db, "DELETE FROM staff WHERE s_id = '$s_id'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function getAllPengepul($query){
        global $db;
        $allpengepul = mysqli_query($db, $query);
        dbClose();

        return $allpengepul;
    }

    function getAllUsers($query){
        global $db;
        $alluser = mysqli_query($db, $query);
        dbClose();

        return $alluser;
    }
    
    function dbClose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "banksampah"));
    }   


?>