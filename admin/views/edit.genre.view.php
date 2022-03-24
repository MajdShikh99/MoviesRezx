<?php require '../controller/sidebar.php'; ?>  


	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Create new genre</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form class="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						<div class="row row--form">
							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
										<span style="color:#fff;">Genre Name</span>
                    <input type="hidden" value="<?php echo $genre['genre_id']; ?>" name="genre_id">
										<input type="text" class="form__input" value="<?php echo $genre['genre_title']; ?>" name="genre_title" placeholder="Genre Edit!" required="">
									</div>
									<div class="col-12">
										<button type="sumbit" class="form__btn" name="save">publish</button>
                    <a href="#modal-delete5" class="form__btn main__table-btn main__table-btn--delete open-modal">
												<button type="sumbit" name="save" style="color:#fff;">Delete Genre</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
	</main>
	<!-- end main content -->


	<!-- modal delete -->
	<div id="modal-delete5" class="zoom-anim-dialog mfp-hide modal">
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
