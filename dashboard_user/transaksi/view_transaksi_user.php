<?php
	require '../../controller/dashboard/dbConnection.php';
	session_start();
	$id = $_SESSION['id'];
	echo $id;
	$all_TransaksiUser = getAllUsers("SELECT t.tu_id, s.s_nama, t.tu_tanggal, t.tu_setor FROM transaksi_user t, staff s where t.s_id = s.s_id AND t.u_id = '$id' ORDER BY t.tu_id");
?>

<?php require_once("../../dashboard/format/head_format_start.php"); ?>
	<title>Transaksi User</title>
<?php require_once("../../dashboard/format/head_format_end.php"); ?>
<body>
	<?php
		if(isset($_SESSION['role']))
		{
			if($_SESSION['role'] == "Users")
			{
	?>
    <!-- WRAPPER -->
	<div id="wrapper">
		<?php require_once("../../dashboard/format/navbar.php"); ?>
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<!-- dashboard -->
						<li><a href="../index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<!--  view transaksi user -->
						<li><a href="transaksi/view_transaksi_user.php" class="active"><i class="lnr lnr-alarm"></i> <span>Transaksi User</span></a></li>
						
					</ul>
				</nav>
			</div>
		</div>
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
														<form method="POST" action="../../controller/dashboard/createFunctionTransaksiUser.php">
															<div class="modal-body">
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="u_id" id="u_id" placeholder="user ID">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<select class="form-control" name="bank" id="bank">
																		<?php
																			$all_bank = getAll("SELECT * FROM cabang_bank");
																			while($bank = mysqli_fetch_array($all_bank)) {
																		?>
																			<option value="<?php echo $bank['b_id']?>"><?php echo $bank['b_nama']?></option>
																		<?php
																			}
																		?>
																	</select>
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="s_id" id="s_id" placeholder="staff ID">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="date" name="tu_tanggal" id="tu_tanggal" placeholder="Tanggal Transaksi">
																</div>
																<div class="input-group col-md-12" style="margin-top: 15px">
																	<input class="form-control" type="text" name="tu_setor" id="tu_setor" placeholder="jumlah setor">
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
									<div class="panel-heading">
										<h3 class="panel-title">Daftar Transaksi</h3>
									</div>
									<div class="panel-body">
									
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Transaksi ID</th>
													<th>Nama Staf</th>
													<th>Tanggal Transaksi</th>
													<th>Total Setor</th>
													<th>Hapus</th>
													<th>Edit</th>
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
										<td><?php echo $transaksi['s_nama']; ?></td>
										<td><?php echo $transaksi['tu_tanggal']; ?></td>
										<td><?php echo $transaksi['tu_setor']; ?></td>
										<form method='POST' action='../../controller/dashboard/deleteFunctionTransaksiUser.php'>
											<input name='tuid' value=<?php echo $transaksi['tu_id']; ?> hidden>
											<td><button type='submit' class='btn btn-error'>
												<i class='fa fa-trash' aria-hidden='true'> Hapus</i>
											</button></td>
										</form>
										<td class='tableItem'>
										<a class="btn btn btn-primary" href="#modalUpdate-<?php echo $transaksi['tu_id'];?>">
											<i class='fa fa-pencil' aria-hidden='true'> Update
											</i>
										</a>
										<div class="modal" id="modalUpdate-<?php echo $transaksi['tu_id'];?>">
											<a href="#close" class="modal-overlay" aria-label="Close">
											</a>
											<div class="modal-container">
												<div class="modal-header">
													<a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
													<div class="modal-title h5">Update Data </div>
												</div>
												<div class="modal-body">
													<form action="../../controller/dashboard/updateFunctionTransaksiUser.php" method="POST">
														<?php
															$id = $transaksi['tu_id'];
															$query_edit = getAllPengepul("SELECT * FROM transaksi_user  where 'tu_id' ='$id'");
															while ($user_edit= mysqli_fetch_array($query_edit))
															{
														?>
															<div class="content">
																<input class="form-input" type="hidden" id="id_trans" name="id_trans" value="<?php echo $user_edit['tu_id']; ?>">
																<div class="form-group">
																	<div class="text-left">
																		<label class="form-label" for="id_user">ID User</label>
																	</div>
																	<input class="form-input" type="text" id="id_user" name="id_user" value="<?php echo $user_edit['u_id']; ?>"placeholder="ID User" required>
																</div>
																<div class="form-group">
																	<div class="text-left">
																		<label class="form-label" for="id_bank">ID Bank</label>
																	</div>
																	<input class="form-input" type="text" id="id_bank" name="id_bank" value="<?php echo $user_edit['b_id']; ?>"placeholder="ID Bank" required>
																</div>
																<div class="form-group">
																	<div class="text-left">
																		<label class="form-label" for="id_staf">ID Staf</label>
																	</div>
																	<input class="form-input" type="text" id="id_staf" name="id_staf" value="<?php echo $user_edit['s_id']; ?>"placeholder="ID Staf" required>
																</div>
																<div class="form-group">
																	<div class="text-left">
																		<label class="form-label" for="Tanggal">Tanggal Transaksi</label>
																	</div>
																	<input class="form-input" type="date" id="Tanggal" name="Tanggal" value="<?php echo $user_edit['tu_tanggal']; ?>"placeholder="Tanggal Transaksi" required>
																</div>
																<div class="form-group">
																	<div class="text-left">
																		<label class="form-label" for="Setor">Jumlah Setor</label>
																	</div>
																	<input class="form-input" type="text" id="Setor" name="Setor" value="<?php echo $user_edit['tu_etor']; ?>"placeholder="Jumlah Setor" required>
																</div>
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-primary">Update</button>
															</div>
														<?php
															}
														?>
													</form>
												</div>
											</div>
										</div>
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
            $_SESSION["gagal"] = "Belum punya role users";
            header('Location: ../../dashboard/auth/login-user.php');
		}
	}
	else
		{
            $_SESSION["gagal"] = "Belum melakukan login";
            header('Location: ../../dashboard/auth/login-user.php');
        }
	?>
	<?php require_once("../../dashboard/format/footer.php"); ?>
</body>
</html>