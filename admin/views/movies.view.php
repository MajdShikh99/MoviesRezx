<?php require '../controller/sidebar.php'; ?>  

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Movies</h2>

						<div class="main__title-wrap">
                            <a href="<?php echo _SITE_URL ?>/admin/controller/new_movie.php" class="main__title-link">add movie</a>

						</div>
					</div>
				</div>
				<!-- end main title -->
<style>
label {
    display: inline-block;
    margin-bottom: 0.5rem;
    color: #fff;
    background: transparent;
    border-radius: 44px;
    padding: 0px 15px;
}
.page-link {
    color: #fff;
    background-color: transparent;
    border: 1px solid #fff;
    margin-bottom: 25%;
}
.form-control:not(.custom-select) {
    color: #fff;
    border: transparent;
    margin-left: 15px;
}

.form-control:not(.custom-select):hover {
    border: 1px solid #ff0000;
}
.page-item.active .page-link {
    z-index: 2;
    color: var(--white-color);
    background-color: red;
}
.main__table tbody td {
    color: #fff;
}
div#DataTables_Table_0_info {
    color: #fff;
}
</style>
				<!-- users -->
				<div class="col-12">
					<div class="main__table-wrap">
						<table data-table="data-table" class="main__table" style="color: #fff;">
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
                            <thead>

							<tbody>

									<?php foreach($movies as $movie): ?>
									<tr>
										<td>
											<div class="main__table-text">
												<img src="../../images/<?php echo $movie['movie_image']; ?>" style="width: 45px; height: 55px">
											</div>
										</td>
										<td>
											<div class="main__table-text"><a href="<?php echo _SITE_URL ?>/movie/<?php echo $movie['movie_id']; ?>/<?php echo $movie['movie_title']; ?>"><span class="span-title"><?php echo $movie['movie_title']; ?></a></div>
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
				<!-- end users -->

			</div>
		</div>
	</main>
	<!-- end main content -->

		
	<!-- modal delete -->
	<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Movie delete</h6>

		<p class="modal__text">Are you sure to permanently delete this item?</p>

		<div class="modal__btns">
			<a class="modal__btn modal__btn--apply" href="<?php echo _SITE_URL ?>/admin/controller/delete_movie.php?id=<?php echo $movie['movie_id']; ?>">
			<button class="modal__btn" type="button">Delete</button>
		    </a>
			<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
		</div>
	</div>
	<!-- end modal delete -->

<script>

    // - Activate Data Tables
    $('[data-table="data-table"]').DataTable({ buttons: ['copy', 'excel', 'pdf'] });

</script>