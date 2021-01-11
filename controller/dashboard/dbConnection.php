<?php

    $db = mysqli_connect("localhost", "root", "", "banksampah");
    if( !$db ) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function getAllStaff($query) {
        global $db;
        $all_staff = mysqli_query($db, $query);

        dbClose();
        return $all_staff;
    }

    function getAllPengepul($query){
        global $db;
        $allpengepul = mysqli_query($db, $query);
        dbClose();

        return $allpengepul;
    }
    function dbClose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "banksampah"));
    }   


?>