<?php
	require '../../controller/dashboard/dbConnection.php';
	$all_TransaksiPengepul = getAllPengepul("SELECT 't.tp_id', 'p.p_username', 's.s_nama', 't.tp_tanggal', 't.tp_ambil' FROM transaksi_pengepul t, pengepul p, staff s where 'p.p_id' = 't.p_id' AND 't.s_id' = 's.s_id'");
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
											</tr>
										</thead>
										<tbody>
									<?php 
										// ambil record
										while($transaksi = mysqli_fetch_array($all_TransaksiPengepul))
										{ 
									?>
									<tr>
										<td><?php echo $transaksi['t.tp_id']; ?></td>
										<td><?php echo $transaksi['p.p_username']; ?></td>
										<td><?php echo $transaksi['s.s_nama']; ?></td>
										<td><?php echo $transaksi['t.tp_tanggal']; ?></td>
										<td><?php echo $transaksi['t.tp_ambil']; ?></td>
										<form method='POST' action='../../controller/dashboard/deleteFunctionTransaksiPengepul.php'>
											<input name='userId' value=<?php echo $transaksi['t.tp_id']; ?> hidden>
											<td><button type='submit' class='btn btn-error'>
												<i class='fa fa-trash' aria-hidden='true'> Hapus</i>
											</button></td>
										</form>
										<td class='tableItem'>
										<a class="btn btn btn-primary" href="#modalUpdate-<?php echo $transaksi['t.tp_id'];?>">
											<i class='fa fa-pencil' aria-hidden='true'> Update	
											</i>
										</a>
										<div class="modal" id="modalUpdate-<?php echo $transaksi['t.tp_id'];?>">
											<a href="#close" class="modal-overlay" aria-label="Close">
											</a>
											<div class="modal-container">
												<div class="modal-header">
													<a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
													<div class="modal-title h5">Update Data </div>
												</div>
												<div class="modal-body">
													<form action="../../controller/dashboard/updateFunctionTransaksiPengepul.php" method="POST">
														<?php
															$id = $transaksi['t.tp_id']; 
															$query_edit = getAllPengepul("SELECT * FROM transaksi_pengepul  where 'tp_id' ='$id'");
															while ($user_edit= mysqli_fetch_array($query_edit)) 
															{  
														?>
															<div class="content">
																<input class="form-input" type="hidden" id="id" name="id" value="<?php echo $user_edit['tp_id']; ?>">
																<div class="form-group">
																	<div class="text-left"> 
																		<label class="form-label" for="id_pengepul">ID Pengepul</label>
																	</div>
																	<input class="form-input" type="text" id="id_pengepul" name="id_pengepul" value="<?php echo $user_edit['p_id']; ?>"placeholder="ID Pengepul" required>
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
																	<input class="form-input" type="date" id="Tanggal" name="Tanggal" value="<?php echo $user_edit['tp_tanggal']; ?>"placeholder="Tanggal Transaksi" required>
																</div>
																<div class="form-group">
																	<div class="text-left">
																		<label class="form-label" for="Ambil">Jumlah Ambil</label>
																	</div>
																	<input class="form-input" type="text" id="Ambil" name="Ambil" value="<?php echo $user_edit['tp_ambil']; ?>"placeholder="Jumlah Ambil" required>
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
		} else {
            $_SESSION["gagal"] = "Belum melakukan login";
            header('Location: ../index.php');
        } 
	?> 
<?php require_once("../format/footer.php"); ?>
</body>
</html>