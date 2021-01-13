<?php

    $db = mysqli_connect("localhost", "root", "", "bank_sampah");
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

    function updatePengepul($request) {
        global $db;
        $p_id = $_POST['p_id'];
        $p_username = $_POST['p_username'];
        $p_alamat = $_POST['p_alamat'];
        $p_telepon = $_POST['p_telepon'];

        mysqli_query($db, "UPDATE pengepul SET p_username = '$p_username', p_alamat = '$p_alamat', p_telp = '$p_telepon' WHERE p_id = '$p_id'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function createPengepul($request) {
        global $db;
        console_log('create pengepul');
        $p_username = $_POST['p_username'];
        $p_alamat = $_POST['p_alamat'];
        $p_telepon = $_POST['p_telepon'];

        mysqli_query($db, "INSERT INTO pengepul (p_username, p_alamat, p_telp) VALUES ('$p_username', '$p_alamat', '$p_telepon')");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function deletePengepul($request) {
        global $db;

        $p_id = $_POST['p_id'];

        mysqli_query($db, "DELETE FROM pengepul WHERE p_id = '$p_id'");
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
    function deleteTransaksiUser($request){
        global $db;

        $ids = $_POST['tuid'];

        mysqli_query($db, "DELETE FROM transaksi_user WHERE tu_id = $ids");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function deleteTransaksiPengepul($request){
        global $db;

        $ids = $_POST['tpid'];

        mysqli_query($db, "DELETE FROM transaksi_pengepul WHERE tp_id = $ids");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function editSampah($request) {
        global $db;

        $sam_id = $_POST['sam_id'];
        $sam_nama = $_POST['sam_nama'];
        $sam_satuan = $_POST['sam_satuan'];
        $sam_hrg_jual = $_POST['sam_hrg_jual'];
        $sam_hrg_beli = $_POST['sam_hrg_beli'];

        mysqli_query($db, "UPDATE sampah SET sam_nama = '$sam_nama', sam_satuan = '$sam_satuan', sam_hrg_jual = '$sam_hrg_jual', sam_hrg_beli = '$sam_hrg_beli' WHERE sam_id = '$sam_id'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function createSampah($request) {
        global $db;

        $sam_nama = $_POST['sam_nama'];
        $sam_satuan = $_POST['sam_satuan'];
        $sam_hrg_jual = $_POST['sam_hrg_jual'];
        $sam_hrg_beli = $_POST['sam_hrg_beli'];

        mysqli_query($db, "INSERT INTO sampah (sam_nama, sam_satuan, sam_hrg_jual, sam_hrg_beli) VALUES ('$sam_nama', '$sam_satuan', '$sam_hrg_jual', '$sam_hrg_beli')");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function updateTransaksiUser($request){
        global $db;


        $tuid = $_POST['id_trans'];
        $uid = $_POST['id_user'];
        $uid = $_POST['id_user'];
        $sid = $_POST['id_staf'];
        $tanggal = $_POST['Tanggal'];
        $setor = $_POST['Setor'];


        mysqli_query($db, "UPDATE transaksi_user SET  u_id = '$uid', s_id = '$sid', tu_tanggal = '$tanggal' , tu_setor = '$setor' WHERE tu_id = '$tuid'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function updateTransaksiPengepul($request){
        global $db;


        $tpid = $_POST['tp_id'];
        $pid = $_POST['p_id'];
        $sid = $_POST['id_staf'];
        $tanggal = $_POST['Tanggal'];
        $ambil = $_POST['Ambil'];


        mysqli_query($db, "UPDATE transaksi_pengepul SET  p_id = '$pid', s_id = '$sid', tp_tanggal = '$tanggal' , tp_ambil = '$ambil' WHERE tp_id = '$tpid'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function createTransaksiUser($request) {
        global $db;

        $u_id = $_POST['u_id'];
        $b_id = $_POST['bank'];
        $tu_tanggal = $_POST['tu_tanggal'];
        $tu_setor = $_POST['tu_setor'];

        mysqli_query($db, "INSERT INTO transaksi_user (u_id, b_id, tu_tanggal, tu_setor) VALUES ('$u_id', '$b_id', '$tu_tanggal', '$tu_setor')");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }


    function dbClose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "bank_sampah"));
    }


?>