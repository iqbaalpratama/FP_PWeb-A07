<?php
	// require '../../controller/dashboard/dbConnection.php';
	// $all_TransaksiPengepul = getAllPengepul("SELECT 't.tp_id', 'p.p_username', 's.s_nama', 't.tp_tanggal', 't.tp_ambil' FROM transaksi_pengepul t, pengepul p, staff s where 'p.p_id' = 't.p_id' AND 't.s_id' = 's.s_id'");
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
						<!-- dashboard -->
						<li><a href="#" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<!-- view user  -->
						<li><a href="#" class=""><i class="lnr lnr-code"></i> <span>Daftar User</span></a></li>
						<!-- view pengepul -->
						<li><a href="#" class=""><i class="lnr lnr-chart-bars"></i> <span>Daftar Pengepul</span></a></li>
						<!--  view transaksi user -->
						<li><a href="../admin_view_transaksi_user.php" class=""><i class="lnr lnr-alarm"></i> <span>Transaksi User</span></a></li>
						<!-- view transaksi pengepul -->
						<li><a href="../admin_view_transaksi_pengepul.php" class=""><i class="lnr lnr-cog"></i> <span>Transaksi Pengepul</span></a></li>
						
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<div class='tableContainer'>
			<?php        
				echo "<table class='table table-striped table-hover table-scroll'>";
				echo("
				<thead>
					<tr>
						<th>Transaksi ID</th>
						<th>Nama Pengepul</th>
						<th>Nama Staf</th>
						<th>Tanggal Transaksi</th>
						<th>Total Ambil</th>
					</tr>
				</thead>
				");
				echo "<tbody>";
				// ambil record
				while($transaksi = mysqli_fetch_array($all_TransaksiPengepul)){
			?>
				<tr>
                    <td><?php echo $transaksi['t.tp_id']; ?></td>
                    <td><?php echo $transaksi['p.p_username']; ?></td>
                    <td><?php echo $transaksi['s.s_nama']; ?></td>
					<td><?php echo $transaksi['t.tp_tanggal']; ?></td>
					<!-- LINK DELETE FUNCTION -->
					<td><?php echo $transaksi['t.tp_ambil']; ?></td>
					<form method='POST' action='../../controller/dashboard/deleteFunctionTransaksiPengepul.php'>
                        <input name='userId' value=<?php echo $transaksi['t.tp_id']; ?> hidden/>
                        <td><button type='submit' class='btn btn-error'>
                            <i class='fa fa-trash' aria-hidden='true'> Hapus</i>
                        </button></td>
					</form>
					<td class='tableItem'>
                    <a class="btn btn btn-primary" href="#modalUpdate-<?php echo $transaksi['t.tp_id'];?>"><i class='fa fa-pencil' aria-hidden='true'> Update	
					</i></a>
					<div class="modal" id="modalUpdate-<?php echo $transaksi['t.tp_id'];?>">
                        <a href="#close" class="modal-overlay" aria-label="Close"></a>
                        <div class="modal-container">
                            <div class="modal-header">
                                <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
                            	<div class="modal-title h5">Update Data Guest</div>
                            </div>
                            <div class="modal-body">
								<!-- fungsi update -->
                            <form action="../../controller/dashboard/updateFunctionTransaksiPengepul.php" method="POST">
                            <?php
                                $id = $transaksi['t.tp_id']; 
                                $query_edit = getAllPengepul("SELECT * FROM transaksi_pengepul  where 'tp_id' ='$id'");
                                while ($user_edit= mysqli_fetch_array($query_edit)) {  
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
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <?php 
                                }
                            ?> 
                        </div>
                    </div>
					
				</tr>
		</div>
	</div>		
	<?php
        // } else {
        //     // $_SESSION["gagal"] = "Belum melakukan login";
        //     header('Location: ../dashboard.php');
        // }
    ?>
</body>