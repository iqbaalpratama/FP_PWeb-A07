<?php
	require '../../controller/dashboard/dbConnection.php';
	$all_TransaksiPengepul = getAllPengepul("SELECT p.p_id, t.tp_id, p.p_username, s.s_id, s.s_nama, t.tp_tanggal, t.tp_ambil FROM transaksi_pengepul t, pengepul p, staff s where p.p_id = t.p_id AND t.s_id = s.s_id ORDER BY t.tp_id");
?>

<?php require_once("../format/head_format_start.php"); ?>
	<title>Transaksi Pengepul</title>
<?php require_once("../format/head_format_end.php"); ?>
<body>
	<?php
		session_start();
		if(isset($_SESSION['username'])){
	?>
    <!-- WRAPPER -->
	<div id="wrapper">
		<?php require_once("../format/navbar.php"); ?>
		<!-- LEFT SIDEBAR -->
		<?php require_once("../format/sidebar_admin.php"); ?>
		<!-- END LEFT SIDEBAR -->
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
									<h3 class="panel-title">Daftar Transaksi Pengepul</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Transaksi ID</th>
												<th>Nama Pengepul</th>
												<th>Nama Staf</th>
												<th>Tanggal Transaksi</th>
												<th>Total Ambil</th>
												<th>Hapus</th>
												<th>Edit</th>
											</tr>
										</thead>
										<tbody>
									<?php
										// ambil record
										while($transaksi = mysqli_fetch_array($all_TransaksiPengepul))
										{
									?>
									<tr>
										<td><?php echo $transaksi['tp_id']; ?></td>
										<td><?php echo $transaksi['p_username']; ?></td>
										<td><?php echo $transaksi['s_nama']; ?></td>
										<td><?php echo $transaksi['tp_tanggal']; ?></td>
										<td><?php echo $transaksi['tp_ambil']; ?></td>
										<td>
										<form method='POST' action='../../controller/dashboard/deleteFunctionTransaksiPengepul.php'>
											<input name='tpid' value=<?php echo $transaksi['tp_id']; ?> hidden>
											<button type='submit' class='btn btn-error'>
												<i class='fa fa-trash' aria-hidden='true'> Hapus</i>
											</button>
										</form>
										</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate-<?php echo $transaksi['tp_id']; ?>">Edit </button>
											<div class="modal fade" id="modalUpdate-<?php echo $transaksi['tp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Update</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form method="POST" action="../../controller/dashboard/updateFunctionTransaksiPengepul.php">
															<div class="modal-body">
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="tp_id" id="tp_id" value="<?php echo $transaksi['tp_id']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="p_id" id="p_id" value="<?php echo $transaksi['p_id']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="id_staf" id="id_staf" placeholder="ID Staff" value="<?php echo $transaksi['s_id']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="date" name="Tanggal" id="Tanggal" placeholder="Tanggal Transaksi" value="<?php echo $transaksi['tp_tanggal']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="Ambil" id="Ambil" placeholder="Total Ambil" value="<?php echo $transaksi['tp_ambil']; ?>">
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		} else {
            $_SESSION["gagal"] = "Belum melakukan login";
            header('Location: ../index.php');
        }
	?>
<?php require_once("../format/footer.php"); ?>
</body>
</html>