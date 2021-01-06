<?

    $db = mysqli_connect("localhost", "root", "", "bank_sampah");
    if( !$db ) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function dbClose() {
        mysli_close(mysqli_connect("localhost", "root", "", "bank_sampah"));
    }   

?>