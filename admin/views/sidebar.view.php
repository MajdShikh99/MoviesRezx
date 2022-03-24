
	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="javascript:void(0);" class="sidebar__logo">
			<h3 class="Logotext" style="color: #ff0000;font-size: 2.5rem;font-weight: 700;">PANEL</h3>
		</a>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="../../images/user.svg" alt="">
			</div>

			<div class="sidebar__user-title">
				<span>Admin</span>
				<p><?php echo $user['user_name']; ?></p>
			</div>

			<a href="../controller/logout.php" class="sidebar__user-btn">
			<button type="button">
				<i class='bx bx-log-in' style='color:#fff;font-size: 1.5rem;margin-left: -21%;margin-top: 18%;' ></i>
			</button>
            </a>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<div class="sidebar__nav-wrap">
			<ul class="sidebar__nav">
				<li class="sidebar__nav-item">
					<a href="<?php echo _SITE_URL ?>/admin/controller/home.php" class="sidebar__nav-link"><i class='bx bx-home' style='color:#f90101'></i> <span>Dashboard</span></a>
				</li>

				<!-- collapse -->
				<li class="sidebar__nav-item">
					<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu"><i class='bx bx-movie' style='color:#f90101' ></i> <span>Movies</span> <i class='bx bx-chevron-down' style='color:#f7f5f5'  ></i></a>

					<ul class="collapse sidebar__menu" id="collapseMenu">
						<li><a href="<?php echo _SITE_URL ?>/admin/controller/movies.php">Categories</a></li>
						<li><a href="<?php echo _SITE_URL ?>/admin/controller/new_movie.php">Add Movie</a></li>
					</ul>
				</li>
				<!-- end collapse -->

				<!-- collapse -->
				<li class="sidebar__nav-item">
					<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu3" role="button" aria-expanded="false" aria-controls="collapseMenu"><i class='bx bx-heart' style='color:#f90101' ></i> <span>Genres</span> <i class='bx bx-chevron-down' style='color:#f7f5f5'  ></i></a>

					<ul class="collapse sidebar__menu" id="collapseMenu3">
						<li><a href="<?php echo _SITE_URL ?>/admin/controller/genres.php">Categories</a></li>
						<li><a href="<?php echo _SITE_URL ?>/admin/controller/new_genre.php">Add Genre</a></li>
					</ul>
				</li>
				<!-- end collapse -->
				
				<!-- collapse -->
				<li class="sidebar__nav-item">
					<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu2" role="button" aria-expanded="false" aria-controls="collapseMenu"><i class='bx bx-user' style='color:#f90101'></i> <span>Users</span> <i class='bx bx-chevron-down' style='color:#f7f5f5'  ></i></a>

					<ul class="collapse sidebar__menu" id="collapseMenu2">
						<li><a href="<?php echo _SITE_URL ?>/admin/controller/users.php">Categories</a></li>
						<li><a href="<?php echo _SITE_URL ?>/admin/controller/new_user.php">Add User</a></li>
					</ul>
				</li>
				<!-- end collapse -->

				<li class="sidebar__nav-item">
					<a href="<?php echo _SITE_URL ?>/admin/controller/settings.php" class="sidebar__nav-link"><i class='bx bx-grid' style='color:#f90101' ></i> <span>General</span></a>
				</li>

				<li class="sidebar__nav-item">
					<a href="<?php echo _SITE_URL ?>" class="sidebar__nav-link"><i class='bx bx-left-arrow-alt' style='color:#f90101' ></i> <span>Back to RezxMovies</span></a>
				</li>
			</ul>
		</div>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© PANEL, 2022-2023.</a></div>
		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->
