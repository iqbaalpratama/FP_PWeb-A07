
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<!-- dashboard -->
						<?php
							if(isset($_SESSION['role']))
							{
								if($_SESSION['role'] == "Staff")
								{
						?>
						<li><a href="../pengguna/index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="../pengguna/staff.php" class=""><i class="lnr lnr-user"></i> <span>Staff</span></a></li>
									<!-- view user  -->
									<li><a href="../pengguna/user.php" class=""><i class="lnr lnr-user"></i> <span>Daftar User</span></a></li>
									<!-- view pengepul -->
									<li><a href="../pengguna/pengepul.php" class=""><i class="lnr lnr-user"></i> <span>Daftar Pengepul</span></a></li>
								</ul>
							</div>
						</li>
						<!-- View sampah -->
						<li><a href="../sampah/sampah.php" class=""><i class="lnr lnr-trash"></i> <span>Sampah</span></a></li>
						<!--  view transaksi user -->
						<li><a href="../transaksi/admin_view_transaksi_user.php" class=""><i class="lnr lnr-alarm"></i> <span>Transaksi User</span></a></li>
						<!-- view transaksi pengepul -->
						<li><a href="../transaksi/admin_view_transaksi_pengepul.php" class=""><i class="lnr lnr-cog"></i> <span>Transaksi Pengepul</span></a></li>
									<?php
								}
								else
								{?>
									<li><a href="../../dashboard_user/transaksi/admin_view_transaksi_pengepul.php"><i class="fas fa-shopping-cart"></i> <span>Transaksi Pengepul</span></a></li>
								<?php
								}
							}
							?>
					</ul>
				</nav>
			</div>
		</div>