<?php

    $db = mysqli_connect("localhost", "root", "", "banksampah");
    if( !$db ) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function dbClose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "banksampah"));
    }

    function loginStaff($request) {
        global $db;

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $status = mysqli_query($db, "SELECT * FROM staff WHERE s_nama = '$username' AND s_password = '$password'");

        dbclose();
        return $status;
    }

    function loginUsers($request) {
        global $db;

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $status = mysqli_query($db, "SELECT * FROM users WHERE u_username = '$username' AND u_password = '$password'");

        dbclose();
        return $status;
    }

    function registerStaff($request) {
        global $db;

        $username=$_POST['nama'];
        $password=md5($_POST['password']);
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];
        $bank_id=$_POST['bank_id'];
        mysqli_query($koneksi,"INSERT INTO staff(s_nama, s_password, s_alamat, s_telepon, s_id) VALUES('$username','$password', '$alamat', '$no_telp', '$id_bank')");
        $status = mysqli_affected_rows($db);

        dbclose();
        return $status;
    }

    function registerUsers($request) {
        global $db;
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $alamat=$_POST['alamat'];
        $no_telp=$_POST['no_telp'];
        if(!$_FILES || !key_exists('file', $_FILES)){
            echo('File tidak terupload.');
        }

        $temporaryFile = $_FILES['file']['tmp_name'];
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        // Check the MIME type
        $supportedFormat = ['image/jpg', 'image/jpeg', 'image/png'];
        if(!in_array(mime_content_type($temporaryFile), $supportedFormat)){
            echo('Unggah file berekstensi JPG, JPEG, atau PNG.');
        }

        // Cek ukuran gambar
        if(getimagesize($temporaryFile) == 0){
            echo('Ukuran tidak valid.');
        }

        // Upload gambar
        $filename = md5($temporaryFile).'.'.$extension;
        // echo($filename);
        move_uploaded_file($temporaryFile, '../../assets/upload/'.$filename);

        mysqli_query($db,"INSERT INTO users(u_username, u_password, u_alamat, u_telp, u_foto) VALUES('$username','$password', '$alamat', '$no_telp', '$filename')");
        $status = mysqli_affected_rows($db);

        dbclose();
        return $status;
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

    function updateTransaksiUser($request){
        global $db;


        $tuid = $_POST['tu_id'];
        $uid = $_POST['u_id'];
        $bid = $_POST['b_id'];
        $sid = $_POST['s_id'];
        $tanggal = $_POST['tu_tanggal'];
        $setor = $_POST['tu_setor'];
        

        mysqli_query($db, "UPDATE transaksi_user SET  u_id = '$uid', b_id = '$bid', s_id = '$sid', tu_tanggal = '$tanggal' , tu_setor = '$setor' WHERE tu_id = '$tuid'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function updateTransaksiPengepul($request){
        global $db;


        $tpid = $_POST['tp_id'];
        $pid = $_POST['p_id'];
        $sid = $_POST['s_id'];
        $tanggal = $_POST['tp_tanggal'];
        $ambil = $_POST['tp_ambil'];
        

        mysqli_query($db, "UPDATE transaksi_pengepul SET  p_id = '$pid', s_id = '$sid', tp_tanggal = '$tanggal' , tp_ambil = '$ambil' WHERE tp_id = '$tpid'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }
?>