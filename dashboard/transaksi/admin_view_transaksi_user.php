<?php
	require '../../controller/dashboard/dbConnection.php';
	$all_TransaksiUser = getAllUsers("SELECT t.tu_id,u.u_id, u.u_username,s.s_id, s.s_nama, t.tu_tanggal, t.tu_setor FROM transaksi_user t, users u, staff s where u.u_id = t.u_id AND t.s_id = s.s_id ORDER BY t.tu_id");
?>

<?php require_once("../format/head_format_start.php"); ?>
	<title>Transaksi User</title>
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
										<h3 class="panel-title">Daftar Transaksi User</h3>
									</div>
									<div class="panel-body">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Transaksi ID</th>
													<th>Nama User</th>
													<th>Nama Staf</th>
													<th>Tanggal Transaksi</th>
													<th>Total Setor</th>
													<th>delete</th>
													<th>update</th>
												</tr>
											</thead>
										<tbody>
									<?php
										// ambil record
										while($transaksi = mysqli_fetch_array($all_TransaksiUser))
										{ 
									?>
									<tr>
										<td><?php echo $transaksi['tu_id']; ?></td>
										<td><?php echo $transaksi['u_username']; ?></td>
										<td><?php echo $transaksi['s_nama']; ?></td>
										<td><?php echo $transaksi['tu_tanggal']; ?></td>
										<td><?php echo $transaksi['tu_setor']; ?></td>
										<td>
											<form method='POST' action='../../controller/dashboard/deleteFunctionTransaksiUser.php'>
												<input name='tuid' value=<?php echo $transaksi['tu_id']; ?> hidden>
												<button type='submit' class='btn btn-error'>
													<i class='fa fa-trash' aria-hidden='true'> Hapus</i>
												</button>
											</form>
										</td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate-<?php echo $transaksi['tu_id']; ?>">Edit </button>
											<div class="modal fade" id="modalUpdate-<?php echo $transaksi['tu_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Update</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form method="POST" action="../../controller/dashboard/updateFunctionTransaksiUser.php">
															<div class="modal-body">
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="id_trans" id="id_trans" value="<?php echo $transaksi['tu_id']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="id_user" id="id_user" value="<?php echo $transaksi['u_id']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="id_staf" id="id_staf" placeholder="ID Staff" value="<?php echo $transaksi['s_id']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="date" name="Tanggal" id="Tanggal" placeholder="Tanggal Transaksi" value="<?php echo $transaksi['tu_tanggal']; ?>">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="Setor" id="Setor" placeholder="Total Setor" value="<?php echo $transaksi['tu_setor']; ?>">
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
	<?php require_once("../format/footer.php"); ?>
</body>
</html>