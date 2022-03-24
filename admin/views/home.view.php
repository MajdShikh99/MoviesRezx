<?php require '../controller/sidebar.php'; ?>  

	<!-- header -->
	<header class="header">
		<div class="header__content">
			<!-- header logo -->
			<a href="index.html" class="header__logo">
				<img src="img/logo.svg" alt="">
			</a>
			<!-- end header logo -->

			<!-- header menu btn -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- end header menu btn -->
		</div>
	</header>
	<!-- end header -->

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row row--grid">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Dashboard</h2>

						<a href="<?php echo _SITE_URL ?>/admin/controller/new_movie.php" class="main__title-link">add movie</a>
					</div>
				</div>
				<!-- end main title -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Movies</span>
						<p><?php echo $movies_total; ?></p>
                        <i class='bx bx-movie' style='color: #f90101;margin-bottom: 13px;margin-right: 9px;' ></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Users</span>
						<p><?php echo $users_total; ?></p>
                        <i class='bx bx-user' style='color: #f90101;margin-bottom: 13px;margin-right: 9px;' ></i>
					</div>
				</div>
				<!-- end stats -->

				<!-- stats -->
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="stats">
						<span>Genres</span>
						<p><?php echo $genres_total; ?></p>
						<i class='bx bx-grid-alt' style='color: #f90101;margin-bottom: 13px;margin-right: 9px;' ></i>
					</div>
				</div>
				<!-- end stats -->


                                              
				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class='bx bx-movie' style='color:#f90101' ></i> Movies</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__more" href="<?php echo _SITE_URL ?>/admin/controller/movies.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Genre</th>
                                        <th>Year</th>
                                        <th>Duration</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($movies as $movie): ?>
									<tr>
										<td>
											<div class="main__table-text">
												<img src="../../images/<?php echo $movie['movie_image']; ?>" style="width: 45px; height: 55px">
											</div>
										</td>
										<td>
											<div class="main__table-text"><a href="#"><span class="span-title"><?php echo $movie['movie_title']; ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $movie['genre_title']; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $movie['movie_year']; ?></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo $movie['movie_duration']; ?></div>
										</td>
										<td>
											<div class="main__table-text">
												<?php
                                                if ($movie['movie_featured'] == 1) {
                                                    echo "<h3 class='main__table-text'>Yeah</h3>";
                                                }else{
                                                    echo "<h3 class='main__table-text'>No</h3>";
                                                }
                                                ?>
											</div>
										</td>
										<td>	
											<div class="main__table-text">
											    <?php
                                                if ($movie['movie_status'] == 1) {
                                                    echo "<h3 class='main__table-text'>Publish</h3>";
                                                }else{
                                                    echo "<h3 class='main__table-text'>Draft</h3>";
                                                }
                                                ?>
											</div>
										</td>
										<td>
											<a href="<?php echo _SITE_URL ?>/admin/controller/edit_movie.php?id=<?php echo $movie['movie_id']; ?>" class="main__table-btn main__table-btn--edit">
												<i class="bx bx-edit-alt" style="color: #ff0000;"></i>
											</a>
											<a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
												<i class='bx bx-message-alt-x' style="color: #ff0000;"></i>
											</a>
										</td>
                                    </tr>
                                    <?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->


                                              
				<!-- dashbox -->
				<div class="col-12 col-xl-6">
					<div class="dashbox">
						<div class="dashbox__title">
							<h3><i class='bx bx-user' style='color:#f90101' ></i> Users</h3>

							<div class="dashbox__wrap">
								<a class="dashbox__more" href="<?php echo _SITE_URL ?>/admin/controller/users.php">View All</a>
							</div>
						</div>

						<div class="dashbox__table-wrap">
							<table class="main__table main__table--dash">
								<thead>
									<tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($users as $user): ?>
									<tr>
										<td>
											<div class="main__table-text">
												<?php echo echoOutput($user['user_id']); ?>
											</div>
										</td>
										<td>
											<div class="main__table-text"><a href="#"><span class="span-title"><?php echo echoOutput($user['user_name']); ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo echoOutput($user['user_email']); ?></div>
										</td>
										<td>
											<div class="main__table-text">
												<?php
                                                    $status = $user['user_role'];
                                                    if ($status == 1) {
                                                        echo 'Admin';
                                                    }else{
                                                        echo 'Normal';
                                                    }
                                                ?>
											</div>
										</td>
										<td>	
											<div class="main__table-text">
											    <?php
                                                    $status = $user['user_status'];
                                                    if ($status == 1) {
                                                        echo '<h3 class="main__table-text">Active</h3>';
                                                    }else{
                                                        echo '<h3 class="main__table-text">Inactive</h3>';
                                                    }
                                                    ?>
											</div>
										</td>
										<td>
											<a href="<?php echo _SITE_URL ?>/admin/controller/edit_user.php?id=<?php echo $user['user_id']; ?>" class="main__table-btn main__table-btn--edit">
												<i class="bx bx-edit-alt" style="color: #ff0000;"></i>
											</a>
										</td>
                                    </tr>
                                    <?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end dashbox -->
		
	<!-- modal delete -->
	<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Movie delete</h6>

		<p class="modal__text">Are you sure to permanently delete this movie?</p>

		<div class="modal__btns">
			<a class="modal__btn modal__btn--apply" href="<?php echo _SITE_URL ?>/admin/controller/delete_movie.php?id=<?php echo $movie['movie_id']; ?>">
			<button class="modal__btn" type="button">Delete</button>
		    </a>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->
		
	<!-- modal delete -->
	<div id="modal-delete2" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">User delete</h6>

		<p class="modal__text">Are you sure to permanently delete this user?</p>

		<div class="modal__btns">
			<a class="modal__btn modal__btn--apply" href="<?php echo _SITE_URL ?>/admin/controller/delete_user.php?id=<?php echo $user['user_id']; ?>">
			<button class="modal__btn" type="button">Delete</button>
		    </a>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->
