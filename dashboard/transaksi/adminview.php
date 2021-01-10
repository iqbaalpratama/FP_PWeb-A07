<?php
//	require '../../controller/dashboard/dbConnection.php';
//	$all_pengepul = getAllPengepul("SELECT * FROM pengepul");
//  $all_user = getAllUser("SELECT * FROM users");
//  $all_sampah = getAllSampah("SELECT * from sampah");
?>

<?php require_once("../format/head_format_start.php"); ?>
	<title>Transaksi Pengepul</title>
<?php require_once("../format/head_format_end.php"); ?>
<body>
	<?php
		// session_start();
		// if(isset($_SESSION['username'])){
	?>
    <!-- WRAPPER -->
	<div id="wrapper">
		<?php require_once("../format/navbar.php"); ?>
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="../index.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="../elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
						<li><a href="../charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="../panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="../../dashboard/pengguna/pengguna.php" class=""><i class="lnr lnr-alarm"></i> <span>Pengguna</span></a></li>
						<li><a href="../tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="../typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="../icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<?php
        // } else {
        //     $_SESSION["gagal"] = "Belum melakukan login";
        //     header('Location: login.php');
        // }
    ?>
</body>