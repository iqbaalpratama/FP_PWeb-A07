<?php
	require '../../controller/dashboard/dbConnection.php';
	session_start();
	$all_staff = getAll("SELECT * FROM sampah");
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
									<h3 class="panel-title">Daftar Sampah</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID Sampah</th>
												<th>Nama Sampah</th>
												<th>Satuan</th>
												<th>Harga Jual</th>
												<th>Harga Beli</th>
                                                <th>Sampah Stok</th>
                                                <th>Edit</th>
											</tr>
										</thead>
										<tbody>
										<?php
											while($staff = mysqli_fetch_array($all_staff)) {
										?>
											<tr>
												<td><?php echo $staff['sam_id']; ?></td>
												<td><?php echo $staff['sam_nama']; ?></td>
												<td><?php echo $staff['sam_satuan']; ?></td>
												<td><?php echo $staff['sam_hrg_jual']; ?></td>
												<td><?php echo $staff['sam_stok']; ?></td>
												<td><?php echo $staff['sam_hrg_beli']; ?></td>
												<td>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate-<?php echo $staff['sam_id']; ?>">Edit</button>
													<div class="modal fade" id="modalUpdate-<?php echo $staff['sam_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<form method="POST" action="../../controller/dashboard/sampah/editSampah.php">
																	<div class="modal-body">
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="sam_id" id="sam_id" value="<?php echo $staff['sam_id']; ?>">
																		</div>
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="sam_nama" id="sam_nama" placeholder="nama" value="<?php echo $staff['sam_nama']; ?>">
																		</div>
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="sam_satuan" id="sam_satuan" placeholder="satuan" value="<?php echo $staff['sam_satuan']; ?>">
																		</div>
																		<div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="sam_hrg_jual" id="sam_hrg_jual" placeholder="harga jual" value="<?php echo $staff['sam_hrg_jual']; ?>">
                                                                        </div>
                                                                        <div class="input-group col-md-12" style="margin-top: 15px">
																			<input class="form-control" type="text" name="sam_hrg_beli" id="sam_hrg_beli" placeholder="harga beli" value="<?php echo $staff['sam_hrg_beli']; ?>">
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
													<form method="POST" action="../../controller/dashboard/sampah/createSampah.php">
														<div class="modal-body">
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="sam_nama" id="sam_nama" placeholder="nama">
                                                            </div>
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="sam_satuan" id="sam_satuan" placeholder="satuan">
                                                            </div>
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="sam_hrg_jual" id="sam_hrg_jual" placeholder="harga jual">
                                                            </div>
                                                            <div class="input-group col-md-12" style="margin-top: 15px">
                                                                <input class="form-control" type="text" name="sam_hrg_beli" id="sam_hrg_beli" placeholder="harga beli">
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
