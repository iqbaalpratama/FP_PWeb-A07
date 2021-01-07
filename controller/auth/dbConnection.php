<?

    $db = mysqli_connect("localhost", "root", "", "bank_sampah");
    if( !$db ) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function dbClose() {
        mysli_close(mysqli_connect("localhost", "root", "", "bank_sampah"));
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

?>