<?php
	require '../../controller/dashboard/dbConnection.php';
	$all_staff = getAll("SELECT * FROM sampah");
?>

<?php require_once("../format/head_format_start.php"); ?>
	<title>Dashboard Staff</title>
<?php require_once("../format/head_format_end.php"); ?>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html">
					<img src="../../assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo">
				</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../../assets/img/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
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
									<h3 class="panel-title">Daftar Staff</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>sam_id</th>
												<th>sam_nama</th>
												<th>sam_satuan</th>
												<th>sam_hrg_jual</th>
												<th>sam_hrg_beli</th>
                                                <th>sam_stok</th>
                                                <th>edit</th>
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
												<td><?php echo $staff['sam_hrg_beli']; ?></td>
												<td>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate-<?php echo $staff['sam_id']; ?>">Edit Staff</button>
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
