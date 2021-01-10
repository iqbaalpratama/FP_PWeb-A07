<?php

    $db = mysqli_connect("localhost", "root", "", "bank_sampah");
    if( !$db ) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function getAllStaff($query) {
        global $db;
        $all_staff = mysqli_query($db, $query);

        dbclose();
        return $all_staff;
    }

    function dbClose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "bank_sampah"));
    }   

?>