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
        move_uploaded_file($temporaryFile, '../upload/'.$filename);

        mysqli_query($koneksi,"INSERT INTO users(u_username, u_password, u_alamat, u_telp, u_foto) VALUES('$username','$password', '$alamat', '$no_telp', '$filename')");
        $status = mysqli_affected_rows($db);

        dbclose();
        return $status;
    }

?>