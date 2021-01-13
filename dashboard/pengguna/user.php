<?php
	require '../../controller/dashboard/dbConnection.php';
	session_start();
	$all_staff = getAll("SELECT * FROM users");
?>

<?php require_once("../format/head_format_start.php"); ?>
	<title>Dashboard Staff</title>
<?php require_once("../format/head_format_end.php"); ?>

<body>
<?php
		if(isset($_SESSION['role']))
		{
			if($_SESSION['role'] == "Staff")
			{
	?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<?php require_once("../format/navbar.php"); ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php require_once("../format/sidebar_admin.php"); ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

					<!-- END OVERVIEW -->
					<div class="row">
                        <div class="">
							<!-- TABLE HOVER -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Daftar Users</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID User</th>
												<th>Nama User</th>
												<th>Alamat</th>
												<th>No Telepon</th>
												<th>Foto</th>
											</tr>
										</thead>
										<tbody>
										<?php
											while($staff = mysqli_fetch_array($all_staff)) {
										?>
											<tr>
												<td><?php echo $staff['u_id']; ?></td>
												<td><?php echo $staff['u_username']; ?></td>
												<td><?php echo $staff['u_alamat']; ?></td>
												<td><?php echo $staff['u_telp']; ?></td>
												<td>
													<img  style="width: 100%; height: auto;" src="../../assets/upload/<?php echo $staff['u_foto'];?>"/>
												</td>
											</tr>
										<?php
											}
										?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<?php
		}
		else
		{
            $_SESSION["gagal"] = "Belum punya role staff";
            header('Location: ../auth/login-staff.php');
		}
	}
	else
		{
            $_SESSION["gagal"] = "Belum melakukan login";
            header('Location: ../auth/login-staff.php');
        }
	?>
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../../assets/scripts/klorofil-common.js"></script>
</body>

</html>
