<?php require '../controller/sidebar.php'; ?>  

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Genres</h2>

						<div class="main__title-wrap">
                            <a href="<?php echo _SITE_URL ?>/admin/controller/new_genre.php" class="main__title-link">add genre</a>

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
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Actions</th>
								</tr>
							</thead>
                            <thead>

							<tbody>
									<?php foreach($genres as $genre): ?>
									<tr>
										<td>
											<div class="main__table-text"><a href="#"><span class="span-title"><?php echo echoOutput($genre['genre_title']); ?></a></div>
										</td>
										<td>
											<div class="main__table-text"><?php echo echoOutput($genre['genre_title']); ?></div>
										</td>
										<td>
											<a href="<?php echo _SITE_URL ?>/admin/controller/edit_genre.php?id=<?php echo echoOutput($genre['genre_id']); ?>" class="main__table-btn main__table-btn--edit">
												<i class="bx bx-edit-alt" style="color: #ff0000;"></i>
											</a>
											<a href="#modal-delete3" class="main__table-btn main__table-btn--delete open-modal">
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
	<div id="modal-delete3" class="zoom-anim-dialog mfp-hide modal">
		<h6 class="modal__title">Genre delete</h6>

		<p class="modal__text">Are you sure to permanently delete this genre?</p>

		<div class="modal__btns">
			<a class="modal__btn modal__btn--apply" href="<?php echo _SITE_URL ?>/admin/controller/delete_genre.php?id=<?php echo $genre['genre_id']; ?>">
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
