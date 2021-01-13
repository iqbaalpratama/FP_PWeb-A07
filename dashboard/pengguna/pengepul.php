<?php
	require '../../controller/dashboard/dbConnection.php';
	session_start();
	$all_staff = getAll("SELECT * FROM pengepul");
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
									<h3 class="panel-title">Daftar Pengepul</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID Pengepul</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>Telepon</th>
												<th>Edit</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
											while($staff = mysqli_fetch_array($all_staff)) {
										?>
											<tr>
												<td><?php echo $staff['p_id']; ?></td>
												<td><?php echo $staff['p_username']; ?></td>
												<td><?php echo $staff['p_alamat']; ?></td>
												<td><?php echo $staff['p_telp']; ?></td>
												<td>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate-<?php echo $staff['p_id']; ?>">Edit</button>
													<div class="modal fade" id="modalUpdate-<?php echo $staff['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<form method="POST" action="../../controller/dashboard/pengguna/editPengepul.php">
																	<div class="modal-body">
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="p_id" id="p_id" value="<?php echo $staff['p_id']; ?>">
																		</div>
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="p_username" id="p_username" placeholder="username" value="<?php echo $staff['p_username']; ?>">
																		</div>
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="p_alamat" id="p_alamat" placeholder="alamat" value="<?php echo $staff['p_alamat']; ?>">
																		</div>
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="p_telepon" id="p_telepon" placeholder="telepon" value="<?php echo $staff['p_telp']; ?>">
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		<button class="btn btn-primary" type="submit">Save changes</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</td>
												<td>
													<form method="POST" action="../../controller/dashboard/pengguna/deletePengepul.php">
														<div class="input-group">
															<input class="form-control" type="text" name="p_id" id="p_id" value="<?php echo $staff['p_id']; ?>" style="display: none;">
														</div>
														<button class="btn btn-danger" type="submit">Delete</button>
													</form>
												</td>
											</tr>
										<?php
											}
										?>
										</tbody>
									</table>
									<div style="flex: 1;">
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah</button>
										<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Update</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form method="POST" action="../../controller/dashboard/pengguna/createPengepul.php">
														<div class="modal-body">
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="p_username" id="p_username" placeholder="username">
                                                            </div>
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="p_alamat" id="p_alamat" placeholder="alamat">
                                                            </div>
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="p_telepon" id="p_telepon" placeholder="telepon">
                                                            </div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button class="btn btn-primary" type="submit">Save changes</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
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
