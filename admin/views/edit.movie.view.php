<?php require '../controller/sidebar.php'; ?>  

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Edit movie</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form enctype="multipart/form-data" class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
						<div class="row row--form">
							<div class="col-12 col-md-5 form__cover">
								<div class="row row--form">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img" style="background: url(../../images/<?php echo $movie['movie_image'] ?>);background-size: cover; background-position: center; height: 266px">
											<label for="form__img-upload">Upload cover (270 x 400)</label>
                                            <input type="hidden" value="<?php echo $movie['movie_image']; ?>" name="movie_image_save">
											<input id="form__img-upload" type="file" accept=".png, .jpg, .jpeg" name="movie_image">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12">
									    <span style="color:#fff;">Movie name</span>
                                        <input type="hidden" value="<?php echo $movie['movie_id']; ?>" name="movie_id">
										<input type="text" value="<?php echo $movie['movie_title']; ?>" name="movie_title" class="form__input" placeholder="Title" required="">	
									</div>
									<div class="col-12">
								    	<span style="color:#fff;">Story</span>
										<textarea id="text" name="movie_description" class="form__textarea" placeholder="Description"><?php echo $movie['movie_description']; ?></textarea>
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Year</span>
										<input class="form__input" value="<?php echo $movie['movie_year']; ?>" placeholder="Release year" name="movie_year" type="text" required="">
									</div>

									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Duration</span>
										<input value="<?php echo $movie['movie_duration']; ?>" name="movie_duration" type="text" class="form__input" placeholder="Running timed in minutes" required="">
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Genres 2</span>
										<input type="text" class="form__input" placeholder="Genres 2 out" value="<?php echo $movie['movie_genree']; ?>" name="movie_genree" required="">
									</div>
									<div class="col-12 col-sm-6 col-lg-3">
									    <span style="color:#fff;">Rating</span>
										<input type="text" class="form__input" placeholder="Rating" value="<?php echo $movie['movie_stars']; ?>" name="movie_stars" required="">
									</div>
									<div class="col-12 col-lg-6">
									    <span style="color:#fff;">Genres</span>
										<select class="js-example-basic-multiple" id="genre" multiple="multiple" name="movie_genre[]" required="">
											<?php foreach($selected_genres as $item): ?>
                                                <option value="<?php echo $item['genre_id']; ?>" selected><?php echo $item['genre_title']; ?></option>
										    <?php endforeach; ?>
                                            <?php foreach($not_selected_genres as $item): ?>
                                                <option value="<?php echo $item['genre_id']; ?>"><?php echo $item['genre_title']; ?></option>
                                            <?php endforeach; ?>
										</select>
									</div>
									<div class="col-12 col-lg-6">
										<span style="color:#fff;">Featured</span>
										<select class="js-example-basic-multiple" id="selectccc" name="movie_featured" required="">
										   <?php
										      $i = $movie['movie_featured'];
										      if($i == 1)
										      {
											  echo '<option value="'.$movie['movie_featured'].'" selected="selected">Yes</option>';
                                              echo '<option value="0">No</option>';
                                              }
                                              else
                                              {
											  echo '<option value="'.$movie['movie_featured'].'" selected="selected">No</option>';
											  echo '<option value="1">Yes</option>';
											  }
											  ?>
										</select>
									</div>
									<div class="col-12 col-lg-6">
									    <span style="color:#fff;">Status</span>
										<select class="js-example-basic-multiple" id="selectccc2" name="movie_status" required="">
										  <?php
										      $i = $movie['movie_status'];
										      if($i == 1)
										      {
												echo '<option value="'.$movie['movie_status'].'" selected="selected">Publish</option>';
												echo '<option value="0">Draft</option>';
											}
											else
											{
												echo '<option value="'.$movie['movie_status'].'" selected="selected">Draft</option>';
												echo '<option value="1">Publish</option>';
											}
											?>
										</select>
									</div>
									</select>
								</div>
							</div>

							<div class="col-12">
								<div class="row row--form">

									<div class="col-12">
									    <input type="text" class="form__input" value="<?php echo $movie['movie_trailer']; ?>" placeholder="Trailer ID Youtube.." name="movie_trailer" required="">
									</div>
									
									<div class="col-12">
								    	<input type="text" class="form__input" value="<?php echo $movie['movie_link']; ?>" placeholder="Link Video Embed.." name="movie_link" required="">
									</div>

									<div class="col-12">
										<button type="sumbit" class="form__btn" name="save">publish</button>
										<a href="#modal-delete" class="form__btn main__table-btn main__table-btn--delete open-modal">
											<button type="sumbit" name="save" style="color:#fff;">Delete Movie</button>
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
		


